<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // POST /api/checkout — Tạo đơn hàng mới từ giỏ hàng
    public function store(Request $request)
    {
        $validated = $request->validate([
            'items'            => 'required|array|min:1',
            'items.*.book_id'  => 'required|integer|exists:books,book_id',
            'items.*.qty'      => 'required|integer|min:1',
            'items.*.price'    => 'nullable|numeric|min:0', // nhận từ client nhưng KHÔNG dùng — giá lấy từ DB
            'shipping_address' => 'required|string',
            'receiver_name'    => 'required|string',
            'receiver_phone'   => 'required|string',
            'payment_method'   => 'required|in:cod,bank_transfer,momo,zalopay',
            'note'             => 'nullable|string',
        ]);

        $user  = $request->user();
        $items = $validated['items'];

        return DB::transaction(function () use ($user, $items, $validated) {
            $totalAmount = 0;
            $bookData    = [];

            // Bước 1: kiểm tra tồn kho + lấy giá từ DB (không tin client)
            foreach ($items as $item) {
                $book = Book::lockForUpdate()->find($item['book_id']);
                if (!$book) {
                    abort(404, 'Không tìm thấy sách.');
                }
                if ($book->stock_quantity < $item['qty']) {
                    abort(422, "Sách '{$book->title}' chỉ còn {$book->stock_quantity} cuốn, không đủ để đặt {$item['qty']} cuốn.");
                }
                // Lấy giá từ DB — không tin giá client gửi lên
                $unitPrice    = ($book->discount_price && $book->discount_price < $book->price)
                    ? (float) $book->discount_price
                    : (float) $book->price;
                $totalAmount += $unitPrice * $item['qty'];

                $bookData[$item['book_id']] = [
                    'book'       => $book,
                    'unit_price' => $unitPrice,
                ];
            }

            // Bước 2: trừ kho sau khi kiểm tra tất cả OK
            foreach ($items as $item) {
                $bookData[$item['book_id']]['book']->decrement('stock_quantity', $item['qty']);
            }

            // Tính phí ship
            $shippingFee = $totalAmount >= 500000 ? 0 : 30000;
            $finalAmount = $totalAmount + $shippingFee;

            // Tạo order — bao gồm đầy đủ thông tin giao hàng
            $order = Order::create([
                'user_id'          => $user->user_id,
                'order_code'       => 'PL' . strtoupper(Str::random(8)),
                'total_amount'     => $totalAmount,
                'discount_amount'  => 0,
                'shipping_fee'     => $shippingFee,
                'final_amount'     => $finalAmount,
                'payment_status'   => 'unpaid',
                'order_status'     => 'pending',
                'note'             => $validated['note'] ?? null,
                'receiver_name'    => $validated['receiver_name'],
                'receiver_phone'   => $validated['receiver_phone'],
                'shipping_address' => $validated['shipping_address'],
            ]);

            // Tạo order items với giá lấy từ DB
            foreach ($items as $item) {
                OrderItem::create([
                    'order_id'   => $order->order_id,
                    'book_id'    => $item['book_id'],
                    'quantity'   => $item['qty'],
                    'unit_price' => $bookData[$item['book_id']]['unit_price'],
                ]);
            }

            // Tạo payment record
            $payment = Payment::create([
                'order_id'       => $order->order_id,
                'payment_method' => $validated['payment_method'],
                'amount'         => $finalAmount,
                'payment_status' => 'pending',
            ]);

            return response()->json([
                'message' => 'Đặt hàng thành công',
                'order'   => $order->load('items.book'),
                'payment' => $payment,
            ], 201);
        });
    }

    // POST /api/orders/{id}/payment/confirm — Xác nhận thanh toán
    public function confirmPayment(Request $request, $orderId)
    {
        return DB::transaction(function () use ($request, $orderId) {
            $order = Order::where('order_id', $orderId)
                ->where('user_id', $request->user()->user_id)
                ->lockForUpdate()  // chống double-confirm
                ->firstOrFail();

            if (!in_array($order->order_status, ['pending'])) {
                return response()->json([
                    'message' => 'Không thể xác nhận thanh toán cho đơn hàng đã ' . match($order->order_status) {
                        'confirmed' => 'được xác nhận rồi',
                        'shipping'  => 'đang giao hàng',
                        'completed' => 'hoàn thành',
                        'cancelled' => 'bị hủy',
                        default     => 'xử lý',
                    },
                ], 422);
            }

            $payment = $order->payment;
            if (!$payment) {
                return response()->json(['message' => 'Không tìm thấy thông tin thanh toán'], 404);
            }

            if ($payment->payment_status === 'success') {
                return response()->json(['message' => 'Đơn hàng đã được thanh toán rồi'], 422);
            }

            $payment->update([
                'payment_status'   => 'success',
                'paid_at'          => now(),
                'transaction_code' => 'TXN' . strtoupper(Str::random(10)),
            ]);

            $order->update(['payment_status' => 'paid', 'order_status' => 'confirmed']);

            return response()->json(['message' => 'Thanh toán thành công', 'order' => $order->fresh()]);
        });
    }
}
