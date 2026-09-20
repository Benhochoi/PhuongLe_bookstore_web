<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * 1. Lấy danh sách sách với filter, search, sort, paginate
     * Query params: category, search, sort(price_asc|price_desc|newest|best_seller),
     *               min_price, max_price, publisher, author, per_page
     */
    public function index(Request $request)
    {
        $query = Book::with(['category', 'authors', 'publisher'])
                     ->where('status', 'active');

        // Lọc theo danh mục
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Tìm kiếm theo tên sách hoặc tác giả
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('authors', function ($qa) use ($search) {
                      $qa->where('author_name', 'like', "%{$search}%");
                  });
            });
        }

        // Lọc theo giá
        if ($request->filled('min_price')) {
            $query->where(function ($q) use ($request) {
                $q->where('discount_price', '>=', $request->min_price)
                  ->orWhere(function ($q2) use ($request) {
                      $q2->whereNull('discount_price')
                         ->where('price', '>=', $request->min_price);
                  });
            });
        }
        if ($request->filled('max_price')) {
            $query->where(function ($q) use ($request) {
                $q->where('discount_price', '<=', $request->max_price)
                  ->orWhere(function ($q2) use ($request) {
                      $q2->whereNull('discount_price')
                         ->where('price', '<=', $request->max_price);
                  });
            });
        }

        // Lọc theo nhà xuất bản
        if ($request->filled('publisher')) {
            $query->where('publisher_id', $request->publisher);
        }

        // Lọc theo tác giả (mảng author_id hoặc single)
        if ($request->filled('author')) {
            $authorIds = is_array($request->author) ? $request->author : [$request->author];
            $query->whereHas('authors', function ($q) use ($authorIds) {
                $q->whereIn('authors.author_id', $authorIds);
            });
        }

        // Lọc theo đánh giá (rating placeholder — chưa có bảng reviews)
        // if ($request->filled('min_rating')) { ... }

        // Sắp xếp
        switch ($request->get('sort', 'newest')) {
            case 'price_asc':
                $query->orderByRaw('COALESCE(discount_price, price) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('COALESCE(discount_price, price) DESC');
                break;
            case 'best_seller':
                // Sắp xếp theo tổng số lượng đã bán (từ order_items, chỉ đơn completed)
                $query->orderByRaw('
                    (SELECT COALESCE(SUM(oi.quantity), 0)
                     FROM order_items oi
                     INNER JOIN orders o ON o.order_id = oi.order_id
                     WHERE oi.book_id = books.book_id
                       AND o.order_status = \'completed\'
                    ) DESC
                ');
                break;
            default: // newest
                $query->orderBy('created_at', 'desc');
                break;
        }

        $perPage = min((int) $request->get('per_page', 12), 48);
        $books   = $query->paginate($perPage);

        return response()->json($books);
    }

    /**
     * 2. Chi tiết sách theo slug hoặc book_id
     */
    public function show($slug)
    {
        // Nếu là số nguyên thì tìm theo book_id
        if (ctype_digit((string) $slug)) {
            $book = Book::with(['category', 'authors', 'publisher', 'images'])
                        ->where('book_id', $slug)
                        ->where('status', 'active')
                        ->first();
        } else {
            $book = Book::with(['category', 'authors', 'publisher', 'images'])
                        ->where('slug', $slug)
                        ->where('status', 'active')
                        ->first();
        }

        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }

        // Sách liên quan (cùng danh mục, trừ chính nó)
        $related = Book::with(['authors'])
                       ->where('category_id', $book->category_id)
                       ->where('book_id', '!=', $book->book_id)
                       ->where('status', 'active')
                       ->inRandomOrder()
                       ->limit(6)
                       ->get();

        return response()->json([
            'book'    => $book,
            'related' => $related,
        ]);
    }

    /**
     * 3. Lọc sách theo danh mục (legacy route giữ tương thích)
     */
    public function getByCategory(Request $request, $categoryId)
    {
        $books = Book::with(['category', 'authors'])
                     ->where('category_id', $categoryId)
                     ->where('status', 'active')
                     ->paginate(12);

        return response()->json($books);
    }

    /**
     * 4. Lấy sách nổi bật (cho trang chủ)
     */
    public function featured()
    {
        $books = Book::with(['category', 'authors'])
                     ->where('status', 'active')
                     ->inRandomOrder()
                     ->limit(8)
                     ->get();

        return response()->json($books);
    }
}