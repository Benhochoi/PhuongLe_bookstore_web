<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false; // bảng payments không có created_at / updated_at

    protected $primaryKey = 'payment_id';
    protected $fillable = ['order_id', 'payment_method', 'transaction_code', 'amount', 'payment_status', 'paid_at'];
    protected $casts = ['paid_at' => 'datetime'];

    public function order() { return $this->belongsTo(Order::class, 'order_id'); }
}
