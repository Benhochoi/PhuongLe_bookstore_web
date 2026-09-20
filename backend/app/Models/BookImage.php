<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    use HasFactory;

    protected $table = 'book_images';
    protected $primaryKey = 'image_id';
    public $timestamps = false;

    protected $fillable = ['book_id', 'image_path', 'sort_order'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }
}
