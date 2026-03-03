<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'is_active',
        'sort_order',
        'promo_code',
       'discount_type',
       'discount_value',
      'min_order_amount',
      'is_active',
      'expires_at'
    ];
}
