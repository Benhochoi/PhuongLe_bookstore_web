<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\OrderItem;
use App\Models\Order;

class ReviewController extends Controller
{
    // GET /api/books/{bookId}/reviews
    public function index($bookId)
    {
        $reviews = Review::where('book_id', $bookId)
            ->where('status', 'approved')
            ->with('user:user_id,full_name,username')
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($reviews);
    }

    // POST /api/books/{bookId}/reviews
    public function store(Request $request, $bookId)
    {
        $user = $request->user();

        // Kiểm tra user đã mua sách này chưa (order_status = completed hoặc payment_status = paid)
        $hasPurchased = OrderItem::whereHas('order', function ($q) use ($user) {
                $q->where('user_id', $user->user_id)
                  ->where(function($q2) {
                      $q2->where('payment_status', 'paid')
                         ->orWhere('order_status', 'completed');
                  });
            })
            ->where('book_id', $bookId)
            ->exists();

        if (!$hasPurchased) {
            return response()->json(['message' => 'Bạn cần mua sách này trước khi đánh giá'], 403);
        }

        // Kiểm tra đã đánh giá chưa
        $existing = Review::where('user_id', $user->user_id)->where('book_id', $bookId)->first();
        if ($existing) {
            return response()->json(['message' => 'Bạn đã đánh giá sách này rồi'], 422);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review = Review::create([
            'user_id' => $user->user_id,
            'book_id' => $bookId,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
            'is_verified_purchase' => true,
            'status' => 'approved',
        ]);

        return response()->json(['message' => 'Đánh giá thành công', 'review' => $review->load('user:user_id,full_name,username')], 201);
    }

    // GET /api/books/{bookId}/reviews/can-review
    public function canReview(Request $request, $bookId)
    {
        $user = $request->user();
        $hasPurchased = OrderItem::whereHas('order', function ($q) use ($user) {
                $q->where('user_id', $user->user_id)
                  ->where(function($q2) {
                      $q2->where('payment_status', 'paid')
                         ->orWhere('order_status', 'completed');
                  });
            })
            ->where('book_id', $bookId)
            ->exists();

        $hasReviewed = Review::where('user_id', $user->user_id)->where('book_id', $bookId)->exists();

        return response()->json([
            'can_review' => $hasPurchased && !$hasReviewed,
            'has_purchased' => $hasPurchased,
            'has_reviewed' => $hasReviewed,
        ]);
    }
}
