<?php

namespace App;

use App\Model\Feedback;
use App\Model\OrderDetail;
use App\Model\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'address', 'contact_number', 'role_id','sub_urb','state','postal_code'
    ];
    public function order(){
        return $this->hasMany(OrderDetail::class);
    }
    public function feedback(){
        return $this->hasMany(Feedback::class);
    }
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_admin()
    {
        $this->role_id == 1 ? true : false;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


}
