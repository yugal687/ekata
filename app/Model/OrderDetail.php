<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable=[
        'order_id',
        'product_id',
        'price',
        'quantity',
        'discount',
        'order_status',
        'user_id',
        'date'
    ];
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
