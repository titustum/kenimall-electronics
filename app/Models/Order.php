<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    // app/Models/Order.php
    protected $fillable = [
        'user_id',
        'order_number',
        'name',
        'email',
        'phone',          // Add this
        'address',
        'suburb',         // Add this
        'state',          // Add this
        'postcode',       // Add this
        'country',        // Add this
        'total',
        'status',
        'payment_intent_id',
        'tracking_number', // Add this
        'carrier',         // Add this
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
