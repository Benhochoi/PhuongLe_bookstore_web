<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Lấy danh sách tác giả (có thể tìm kiếm theo tên)
    public function index(Request $request)
    {
        $query = Author::orderBy('author_name');

        if ($request->filled('search')) {
            $query->where('author_name', 'like', '%' . $request->search . '%');
        }

        $authors = $query->limit(100)->get(['author_id', 'author_name']);
        return response()->json($authors);
    }
}
