<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return response()->json(
            Publisher::withCount('books')->orderBy('publisher_name')->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'publisher_name' => 'required|string|max:150',
            'address'        => 'nullable|string|max:255',
            'phone'          => 'nullable|string|max:20',
            'email'          => 'nullable|email|max:100',
        ]);
        return response()->json(Publisher::create($validated), 201);
    }

    public function update(Request $request, $id)
    {
        $pub = Publisher::findOrFail($id);
        $pub->update($request->only(['publisher_name', 'address', 'phone', 'email']));
        return response()->json($pub->fresh());
    }

    public function destroy($id)
    {
        $pub = Publisher::findOrFail($id);
        if ($pub->books()->count() > 0) {
            return response()->json(['message' => 'Không thể xóa nhà xuất bản đang có sách'], 422);
        }
        $pub->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }
}
