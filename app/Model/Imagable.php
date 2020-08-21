<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imagable extends Model
{
    protected $fillable=[
      'name',
        'imagable_id',
        'imagable_type'
    ];
    public function imagable(){
        return $this->morphTo();
    }
}
