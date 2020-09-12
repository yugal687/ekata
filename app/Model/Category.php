<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{

    protected $fillable=[
      'category_name',
        'image',
        'parent_id'
    ];
    public function images(){
        return $this->morphMany(Imagable::class,'imagable');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
