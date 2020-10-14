<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $fillable=[
        "postal_code_id",
        "state_id",
        "delivery_charge"
    ];
    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function postCode(){
        return $this->belongsTo(PostalCode::class,'postal_code_id');
    }
}
