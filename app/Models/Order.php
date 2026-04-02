<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'dining_table_id', 'member_id', 'order_number', 
        'total_price', 'discount_amount', 'status', 'payment_method'
    ];

    public function orderItems() 
    {
        return $this->hasMany(OrderItem::class);
    }

    public function diningTable() 
    {
        return $this->belongsTo(DiningTable::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function member() 
    {
        return $this->belongsTo(Member::class);
    }
}
