<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'total_price',
        'shipping_address',
        'email',
        'contact_number',
        'sub_urb',
        'first_name',
        'last_name',
        'registered_user',
        'state',
        'order_status',
        'postal_code'
    ];

    public function items()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }


    //
}
