<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',      // nullable if guest orders allowed
        'status',       // pending, completed, canceled, etc.
        'total',
        'order_number', // unique order number for tracking
        'payment_intent_id', // for payment processing
        'name',
        'email',
        'address', 
        'payment_method',
        // add fields as needed
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function getRouteKeyName()
    {
        return 'order_number';
    }

}
