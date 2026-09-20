<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Danh sách sách — lọc theo tên/ISBN, danh mục, trạng thái, phân trang.
     * GET /api/admin/books?search=...&category_id=...&status=active&page=1
     */
    public function index(Request $request)
    {
        $query = Book::with(['category', 'publisher', 'authors'])
            ->orderByDesc('created_at');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('isbn', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $perPage = (int) ($request->per_page ?? 12);
        $books = $query->paginate($perPage);

        return response()->json([
            'data' => $books->items(),
            'meta' => [
                'total' => $books->total(),
                'current_page' => $books->currentPage(),
                'last_page' => $books->lastPage(),
            ],
        ]);
    }

    /**
     * Chi tiết 1 sách — dùng để đổ dữ liệu vào form sửa.
     * GET /api/admin/books/{id}
     */
    public function show($id)
    {
        $book = Book::with(['category', 'publisher', 'authors', 'images'])->find($id);

        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }

        return response()->json(['data' => $book]);
    }

    /**
     * Thêm sách mới.
     * POST /api/admin/books
     */
    public function store(Request $request)
    {
        $validated = $this->validateBook($request);

        $book = new Book();
        $book->fill($validated);

        if (empty($book->slug)) {
            $book->slug = $this->uniqueSlug($validated['title']);
        }

        $book->save();

        if ($request->filled('author_ids')) {
            $book->authors()->sync($request->author_ids);
        }

        $this->syncImages($book, $request->input('images', []));

        return response()->json([
            'message' => 'Thêm sách thành công',
            'data' => $book->fresh(['category', 'publisher', 'authors', 'images']),
        ], 201);
    }

    /**
     * Cập nhật thông tin sách (bao gồm cả đổi trạng thái).
     * PUT /api/admin/books/{id}
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }

        $validated = $this->validateBook($request, $id);
        $book->fill($validated);
        $book->save();

        if ($request->has('author_ids')) {
            $book->authors()->sync($request->author_ids ?? []);
        }

        if ($request->has('images')) {
            $this->syncImages($book, $request->input('images', []));
        }

        return response()->json([
            'message' => 'Cập nhật sách thành công',
            'data' => $book->fresh(['category', 'publisher', 'authors', 'images']),
        ]);
    }

    /**
     * Đồng bộ danh sách ảnh phụ (book_images) — đơn giản hoá bằng cách
     * xóa toàn bộ ảnh cũ rồi tạo lại theo danh sách mới từ form (kèm sort_order).
     */
    private function syncImages($book, array $images)
    {
        if (!method_exists($book, 'images')) {
            return;
        }

        $book->images()->delete();

        foreach ($images as $idx => $img) {
            if (!empty($img['image_path'])) {
                $book->images()->create([
                    'image_path' => $img['image_path'],
                    'sort_order' => $img['sort_order'] ?? $idx,
                ]);
            }
        }
    }

    /**
     * Xóa sách — chặn xóa cứng nếu sách đã từng nằm trong đơn hàng
     * (đúng nghiệp vụ: tránh vỡ dữ liệu lịch sử đơn hàng cũ).
     * DELETE /api/admin/books/{id}
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }

        if (method_exists($book, 'orderItems') && $book->orderItems()->exists()) {
            return response()->json([
                'message' => 'Sách đã từng có trong đơn hàng nên không thể xóa. Hãy chuyển trạng thái sang "Ngừng bán" thay vì xóa.',
            ], 422);
        }

        $book->delete();

        return response()->json(['message' => 'Xóa sách thành công']);
    }

    private function validateBook(Request $request, $id = null)
    {
        return $request->validate([
            'category_id'    => 'required|exists:categories,category_id',
            'publisher_id'   => 'nullable|exists:publishers,publisher_id',
            'isbn'           => ['nullable', 'string', 'max:20', Rule::unique('books', 'isbn')->ignore($id, 'book_id')],
            'title'          => 'required|string|max:255',
            'slug'           => ['nullable', 'string', 'max:255', Rule::unique('books', 'slug')->ignore($id, 'book_id')],
            'image'          => 'nullable|string|max:500',
            'description'    => 'nullable|string',
            'price'          => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'stock_quantity' => 'required|integer|min:0',
            'page_count'     => 'nullable|integer|min:1',
            'publish_year'   => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'language'       => 'nullable|string|max:50',
            'weight'         => 'nullable|numeric|min:0',
            'dimensions'     => 'nullable|string|max:100',
            'cover_type'     => 'nullable|string|max:50',
            'status'         => 'required|in:active,inactive',
            'images'                 => 'nullable|array',
            'images.*.image_path'   => 'required_with:images|string|max:500',
            'images.*.sort_order'   => 'nullable|integer|min:0',
        ], [
            'category_id.required'  => 'Vui lòng chọn danh mục',
            'category_id.exists'    => 'Danh mục không hợp lệ',
            'title.required'        => 'Vui lòng nhập tên sách',
            'price.required'        => 'Vui lòng nhập giá bán',
            'discount_price.lt'     => 'Giá khuyến mãi phải nhỏ hơn giá bán',
            'stock_quantity.required' => 'Vui lòng nhập số lượng tồn kho',
            'isbn.unique'            => 'ISBN đã tồn tại',
            'slug.unique'            => 'Slug đã tồn tại',
        ]);
    }

    private function uniqueSlug($title)
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;
        while (Book::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
