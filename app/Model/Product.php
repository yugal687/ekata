<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable=[
      'category_id',
        'brand_id',
        'product_name',
        'price',
        'sale_price',
        'additional_information',
        'quantity',
        'discount'
    ];
    public function image(){
        return $this->morphMany(Imagable::class,'imagable');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public  function order(){
        return $this->hasMany(OrderDetail::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'products_tags','product_id','tag_id');
    }
}
