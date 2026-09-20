<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImport extends Model
{
    protected $primaryKey = 'import_id';

    protected $fillable = [
        'import_code',
        'supplier_name',
        'note',
        'created_by',
        'total_cost',
    ];

    public function items()
    {
        return $this->hasMany(StockImportItem::class, 'import_id', 'import_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }
}
