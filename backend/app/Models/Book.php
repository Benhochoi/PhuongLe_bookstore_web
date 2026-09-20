<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'book_id';

    protected $fillable = [
        'category_id',
        'publisher_id',
        'isbn',
        'title',
        'image',
        'slug',
        'description',
        'price',
        'discount_price',
        'stock_quantity',
        'page_count',
        'publish_year',
        'language',
        'weight',
        'status',
    ];

    protected $casts = [
        'price'          => 'decimal:2',
        'discount_price' => 'decimal:2',
        'weight'         => 'decimal:2',
    ];

    // Quan hệ với Danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    // Quan hệ với Nhà xuất bản
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'publisher_id');
    }

    // Quan hệ N-N với Tác giả
    public function authors()
    {
        return $this->belongsToMany(
            Author::class,
            'book_authors',
            'book_id',
            'author_id',
            'book_id',
            'author_id'
        );
    }

    // Quan hệ với ảnh phụ (nếu bảng book_images tồn tại)
    public function images()
    {
        return $this->hasMany(BookImage::class, 'book_id', 'book_id')
                    ->orderBy('sort_order');
    }
}