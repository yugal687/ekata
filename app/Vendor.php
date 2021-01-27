<?php

namespace App;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable=[
      'vendor_name',
      'email',
      'contact',
      'address'
    ];
    public function product(){
        return $this->hasMany(Product::class);
    }
}
