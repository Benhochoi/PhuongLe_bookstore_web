<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImportItem extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'item_id';

    protected $fillable = [
        'import_id',
        'book_id',
        'quantity',
        'unit_cost',
        'total_cost',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    public function stockImport()
    {
        return $this->belongsTo(StockImport::class, 'import_id', 'import_id');
    }
}
