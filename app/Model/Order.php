<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    public function items()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }


    public static function saveOrderItems($order)
    {

    }


    //
}
