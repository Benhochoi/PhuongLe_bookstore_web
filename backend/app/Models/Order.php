<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'coupon_id',
        'order_code',
        'total_amount',
        'discount_amount',
        'shipping_fee',
        'final_amount',
        'payment_status',
        'order_status',
        'note',
        'receiver_name',
        'receiver_phone',
        'shipping_address',
        'confirmed_by',
        'shipped_by',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'shipping_fee' => 'decimal:2',
        'final_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function confirmer()
    {
        return $this->belongsTo(User::class, 'confirmed_by', 'user_id');
    }

    public function shipper()
    {
        return $this->belongsTo(User::class, 'shipped_by', 'user_id');
    }
}
