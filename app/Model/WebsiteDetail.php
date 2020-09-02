<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebsiteDetail extends Model
{
    protected $fillable=[
      'email',
      'contact_number',
        'address',
        'additional_information',
        'optional_contact',
        'optional_email'
    ];
}
