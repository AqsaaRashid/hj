<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'street',
        'city',
        'zip',
        'subtotal',
        'discount',
        'total',
        'stripe_session_id',
        'payment_method',
        'payment_status',
        'order_status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}