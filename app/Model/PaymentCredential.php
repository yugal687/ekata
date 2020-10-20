<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentCredential extends Model
{
    protected $fillable=[
        "payment_type",
        "secret_key",
        "api_key"
    ];
}
