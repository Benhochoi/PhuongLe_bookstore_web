<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $table = 'publishers';
    protected $primaryKey = 'publisher_id';

    protected $fillable = [
        'publisher_name',
        'address',
        'phone',
        'email',
        'website',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id', 'publisher_id');
    }
}
