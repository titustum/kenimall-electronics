<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id', // nullable for guest checkout
        'order_number',
        'name',
        'email',
        'phone',
        'address',
        'suburb',   // Add this
        'state',    // Add this
        'postcode', // Add this
        'country',
        'total',
        'status',
        'payment_intent_id',
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
