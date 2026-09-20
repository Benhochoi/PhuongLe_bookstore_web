<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PublisherController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\StaffController as AdminStaffController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\PublisherController as AdminPublisherController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Admin\StockImportController as AdminStockImportController;

// Public reviews
Route::get('/books/{bookId}/reviews', [ReviewController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Danh mục, nhà xuất bản, tác giả
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/publishers', [PublisherController::class, 'index']);
Route::get('/authors', [AuthorController::class, 'index']);

// Sách
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/featured', [BookController::class, 'featured']);
Route::get('/books/{slug}', [BookController::class, 'show']);
Route::get('/categories/{categoryId}/books', [BookController::class, 'getByCategory']);

Route::post('/refresh', [AuthController::class, 'refresh']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::put('/profile/password', [AuthController::class, 'changePassword']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/stats', [OrderController::class, 'stats']);

    // Checkout
    Route::post('/checkout', [CheckoutController::class, 'store']);
    Route::post('/orders/{id}/payment/confirm', [CheckoutController::class, 'confirmPayment']);
    
    // Reviews (authenticated)
    Route::post('/books/{bookId}/reviews', [ReviewController::class, 'store']);
    Route::get('/books/{bookId}/reviews/can-review', [ReviewController::class, 'canReview']);
    // Huỷ đơn hàng
    Route::patch('/orders/{id}/cancel', [OrderController::class, 'cancel']);

    // ── Quản lý đơn hàng (Admin, Nhân viên, Shipper) ──
    Route::middleware('role:1,2,4')->prefix('admin')->group(function () {
        Route::get('/orders/stats', [AdminOrderController::class, 'stats']);
        Route::get('/orders', [AdminOrderController::class, 'index']);
        Route::get('/orders/{id}', [AdminOrderController::class, 'show']);
        Route::patch('/orders/{id}/status', [AdminOrderController::class, 'updateStatus']);
    });

    // ── Quản lý sách (Admin, Nhân viên) ──
    Route::middleware('role:1,2')->prefix('admin')->group(function () {
        Route::get('/books', [AdminBookController::class, 'index']);
        Route::post('/books', [AdminBookController::class, 'store']);
        Route::get('/books/{id}', [AdminBookController::class, 'show']);
        Route::put('/books/{id}', [AdminBookController::class, 'update']);
        Route::delete('/books/{id}', [AdminBookController::class, 'destroy']);

        // Nhập kho
        Route::get('/stock-imports', [AdminStockImportController::class, 'index']);
        Route::post('/stock-imports', [AdminStockImportController::class, 'store']);
        Route::get('/stock-imports/{id}', [AdminStockImportController::class, 'show']);
    });

    // ── Quyền Admin (role_id=1) ──
    Route::middleware('role:1')->prefix('admin')->group(function () {
        // Nhân viên
        Route::get('/staff', [AdminStaffController::class, 'index']);
        Route::post('/staff', [AdminStaffController::class, 'store']);
        Route::put('/staff/{id}', [AdminStaffController::class, 'update']);
        Route::delete('/staff/{id}', [AdminStaffController::class, 'destroy']);
        Route::get('/roles', function() {
            return response()->json(\App\Models\Role::all());
        });

        // CRUD
        Route::post('/categories', [AdminCategoryController::class, 'store']);
        Route::put('/categories/{id}', [AdminCategoryController::class, 'update']);
        Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy']);
        
        Route::post('/authors', [AdminAuthorController::class, 'store']);
        Route::put('/authors/{id}', [AdminAuthorController::class, 'update']);
        Route::delete('/authors/{id}', [AdminAuthorController::class, 'destroy']);
        
        Route::post('/publishers', [AdminPublisherController::class, 'store']);
        Route::put('/publishers/{id}', [AdminPublisherController::class, 'update']);
        Route::delete('/publishers/{id}', [AdminPublisherController::class, 'destroy']);
    });

    // ── Admin & Staff: Read ──
    Route::middleware('role:1,2')->prefix('admin')->group(function () {
        Route::get('/categories', [AdminCategoryController::class, 'index']);
        Route::get('/authors', [AdminAuthorController::class, 'index']);
        Route::get('/publishers', [AdminPublisherController::class, 'index']);
    });
});