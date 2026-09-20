<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json(
            Author::withCount('books')->orderBy('author_name')->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:100',
            'biography'   => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
            'birth_date'  => 'nullable|date',
        ]);
        return response()->json(Author::create($validated), 201);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->only(['author_name', 'biography', 'nationality', 'birth_date']));
        return response()->json($author->fresh());
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        if ($author->books()->count() > 0) {
            return response()->json(['message' => 'Không thể xóa tác giả đang có sách'], 422);
        }
        $author->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }
}
