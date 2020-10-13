<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StatePostalCode extends Model
{
   protected $fillable=[
       "postal_code_id",
       "state_id",
       "delivery_charge"
   ];
}
