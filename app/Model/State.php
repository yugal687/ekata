<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state'
    ];

    public function deliveryAddress()
    {
        return $this->hasMany(DeliveryAddress::class, 'state_id');
    }
}
