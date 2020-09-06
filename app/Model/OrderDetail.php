<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable=[
        'order_id',
        'product_id',
        'price',
        'quantity',
        'discount',
        'user_id',
        'date'
    ];
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public  function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
