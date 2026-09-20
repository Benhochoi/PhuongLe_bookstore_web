<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Lấy danh sách toàn bộ danh mục đang hoạt động
    public function index()
    {
        $categories = Category::where('status', 'active')->get();
        return response()->json($categories);
    }
}