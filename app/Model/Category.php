<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{

    protected $fillable=[
      'category_name',
        'parent_id'
    ];
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
