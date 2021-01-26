<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=[
      'title',
      'image',
      'description',
      'start_date',
      'end_date',
        'status'
    ];
}
