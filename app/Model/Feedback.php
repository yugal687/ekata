<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable=[
        'user_id',
        'star',
        'feedback'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
