<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    /** Các trạng thái đơn hàng hợp lệ trong hệ thống */
    private const VALID_STATUSES = ['pending', 'confirmed', 'shipping', 'completed', 'cancelled'];

    /**
     * Danh sách đơn hàng — có lọc theo trạng thái, tìm kiếm, khoảng ngày, phân trang.
     * GET /api/admin/orders?status=pending&search=abc&from_date=...&to_date=...&page=1
     */
    public function index(Request $request)
    {
        if (!Schema::hasTable('orders')) {
            return response()->json([
                'data' => [],
                'meta' => ['total' => 0, 'current_page' => 1, 'last_page' => 1, 'per_page' => 15],
            ]);
        }

        $query = Order::with(['items.book', 'user', 'confirmer', 'shipper'])
            ->orderByDesc('created_at');

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('order_status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('full_name', 'like', "%{$search}%")
                         ->orWhere('phone', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $perPage = (int) ($request->per_page ?? 15);
        $orders = $query->paginate($perPage);

        return response()->json([
            'data' => $orders->items(),
            'meta' => [
                'total' => $orders->total(),
                'current_page' => $orders->currentPage(),
                'last_page' => $orders->lastPage(),
                'per_page' => $orders->perPage(),
            ],
        ]);
    }

    /**
     * Chi tiết 1 đơn hàng (đầy đủ sản phẩm + thông tin khách hàng).
     * GET /api/admin/orders/{id}
     */
    public function show($id)
    {
        $order = Order::with(['items.book', 'user', 'confirmer', 'shipper'])->find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        return response()->json(['data' => $order]);
    }

    /**
     * Cập nhật trạng thái đơn hàng.
     * PATCH /api/admin/orders/{id}/status   { order_status: 'confirmed' }
     */
    public function updateStatus(Request $request, $id)
    {
        $user = $request->attributes->get('auth_user') ?? auth()->user();
        $validated = $request->validate([
            'order_status' => 'required|in:' . implode(',', self::VALID_STATUSES),
        ]);

        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        if (in_array($order->order_status, ['completed', 'cancelled'], true)) {
            return response()->json(['message' => 'Đơn hàng đã chốt, không thể thay đổi'], 422);
        }

        $newStatus = $validated['order_status'];

        // Phân quyền theo role
        if ($user && $user->role_id === 4) { // Shipper
            if (!in_array($newStatus, ['shipping', 'completed'])) {
                return response()->json(['message' => 'Shipper chỉ được cập nhật trạng thái Giao hàng hoặc Hoàn thành'], 403);
            }
            if ($newStatus === 'shipping' && $order->order_status !== 'confirmed') {
                return response()->json(['message' => 'Chỉ có thể giao đơn đã xác nhận'], 422);
            }
            if ($newStatus === 'completed' && $order->order_status !== 'shipping') {
                return response()->json(['message' => 'Chỉ có thể hoàn thành đơn đang giao'], 422);
            }
        } elseif ($user && $user->role_id === 2) { // Nhân viên
            if (in_array($newStatus, ['shipping', 'completed'])) {
                return response()->json(['message' => 'Nhân viên không được cập nhật trạng thái vận chuyển'], 403);
            }
        }

        $oldStatus = $order->order_status;
        $order->order_status = $newStatus;
        if ($newStatus === 'completed') {
            $order->payment_status = 'paid';
        }

        // Track who confirmed and who shipped
        if ($newStatus === 'confirmed' && !$order->confirmed_by && $user) {
            $order->confirmed_by = $user->user_id;
        }
        if ($newStatus === 'shipping' && !$order->shipped_by && $user) {
            $order->shipped_by = $user->user_id;
        }

        // Handle Stock Deductions and Restorations
        if ($newStatus === 'cancelled') {
            // Luôn hoàn lại tồn kho khi hủy (kho bị trừ ngay từ lúc đặt)
            foreach ($order->items as $item) {
                if ($item->book) {
                    $item->book->increment('stock_quantity', $item->quantity);
                }
            }
        }

        $order->save();

        return response()->json([
            'message' => 'Cập nhật trạng thái thành công',
            'data' => $order->fresh(['items.book', 'user', 'confirmer', 'shipper']),
        ]);
    }

    /**
     * Thống kê tổng quan cho dashboard admin.
     * GET /api/admin/orders/stats
     */
    public function stats(Request $request)
    {
        if (!Schema::hasTable('orders')) {
            return response()->json([
                'total_revenue' => 0,
                'total_orders'  => 0,
                'today_revenue' => 0,
                'today_orders'  => 0,
                'by_status'     => array_fill_keys(self::VALID_STATUSES, 0),
            ]);
        }

        $today = now()->toDateString();

        // Dùng aggregate query thay vì Order::all() — tránh OOM khi dữ liệu lớn
        $totalRevenue = Order::where('order_status', 'completed')->sum('final_amount');
        $totalOrders  = Order::count();
        $todayRevenue = Order::where('order_status', 'completed')
            ->whereDate('created_at', $today)
            ->sum('final_amount');
        $todayOrders  = Order::whereDate('created_at', $today)->count();

        $byStatus = [];
        foreach (self::VALID_STATUSES as $status) {
            $byStatus[$status] = Order::where('order_status', $status)->count();
        }

        return response()->json([
            'total_revenue' => (float) $totalRevenue,
            'total_orders'  => $totalOrders,
            'today_revenue' => (float) $todayRevenue,
            'today_orders'  => $todayOrders,
            'by_status'     => $byStatus,
        ]);
    }
}