<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'order_number',
        'total_price'
    ];
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
