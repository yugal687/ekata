<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'total_price',
        'shipping_address',
        'sub_urb',
        'state',
        'order_status',
        'postal_code'
    ];


    public function items()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }


    public static function saveOrderItems($order)
    {

    }


    //
}
