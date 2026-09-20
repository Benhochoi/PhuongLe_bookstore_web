<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publisher;

class PublisherController extends Controller
{
    // Lấy danh sách toàn bộ nhà xuất bản
    public function index()
    {
        $publishers = Publisher::orderBy('publisher_name')->get(['publisher_id', 'publisher_name']);
        return response()->json($publishers);
    }
}
