<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if (!Schema::hasTable('orders')) {
            return response()->json(['data' => []]);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $orders = Order::with(['items.book.authors'])
            ->where('user_id', $user->user_id)
            ->orderByDesc('created_at')
            ->get();

        return response()->json(['data' => $orders]);
    }

    /**
     * Hủy đơn hàng — chỉ cho phép khi đơn đang ở trạng thái "chờ xác nhận" (pending)
     * và thuộc về chính người dùng đang đăng nhập.
     */
    public function cancel(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $order = Order::where('order_id', $id)
            ->where('user_id', $user->user_id)
            ->first();

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        if (!in_array($order->order_status, ['pending', 'confirmed'])) {
            return response()->json([
                'message' => 'Chỉ có thể hủy đơn hàng đang chờ xác nhận hoặc đã xác nhận',
            ], 422);
        }

        return \Illuminate\Support\Facades\DB::transaction(function () use ($order) {
            // Cập nhật trạng thái đơn + payment trong 1 transaction
            $paymentStatus = $order->payment_status === 'paid' ? 'refunded' : 'cancelled';
            $order->order_status   = 'cancelled';
            $order->payment_status = $paymentStatus;
            $order->save();

            // Hoàn lại tồn kho cho từng sản phẩm
            foreach ($order->items as $item) {
                if ($item->book) {
                    $item->book->increment('stock_quantity', $item->quantity);
                }
            }

            return response()->json([
                'message' => 'Hủy đơn hàng thành công',
                'order'   => $order->fresh(),
            ]);
        });
    }

    public function stats(Request $request)
    {
        if (!Schema::hasTable('orders')) {
            return response()->json([
                'total_spent' => 0,
                'successful_orders' => 0,
                'total_orders' => 0,
            ]);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $orders = Order::where('user_id', $user->user_id)->get();
        $completed = $orders->where('order_status', 'completed');
        // Đơn đã hủy không tính vào "Số đơn hàng" hiển thị ở thẻ thống kê,
        // nhưng vẫn giữ nguyên trong danh sách "Đơn hàng của tôi".
        $countedOrders = $orders->where('order_status', '!=', 'cancelled');

        return response()->json([
            'total_spent' => (float) $completed->sum('final_amount'),
            'successful_orders' => $completed->count(),
            'total_orders' => $countedOrders->count(),
        ]);
    }
}