<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'review_id';
    public $timestamps = false;
    protected $fillable = ['user_id', 'book_id', 'rating', 'comment', 'is_verified_purchase', 'status'];

    public function user() { return $this->belongsTo(User::class, 'user_id'); }
    public function book() { return $this->belongsTo(Book::class, 'book_id'); }
}
