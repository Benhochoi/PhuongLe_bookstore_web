<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(
            Category::withCount('books')->orderBy('category_name')->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:100|unique:categories,category_name',
            'description'   => 'nullable|string',
            'status'        => 'nullable|in:active,inactive',
        ]);
        $cat = Category::create([
            'category_name' => $validated['category_name'],
            'description'   => $validated['description'] ?? null,
            'status'        => $validated['status'] ?? 'active',
        ]);
        return response()->json($cat, 201);
    }

    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
        $validated = $request->validate([
            'category_name' => "sometimes|string|max:100|unique:categories,category_name,$id,category_id",
            'description'   => 'nullable|string',
            'status'        => 'nullable|in:active,inactive',
        ]);
        $cat->update($validated);
        return response()->json($cat->fresh());
    }

    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        if ($cat->books()->count() > 0) {
            return response()->json(['message' => 'Không thể xóa danh mục đang có sách'], 422);
        }
        $cat->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }
}
