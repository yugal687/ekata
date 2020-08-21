<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=[
      'tags'
    ];
    public function product(){
        return $this->belongsToMany(Product::class,'products_tags','tag_id','product_id');
    }
    public static function savefactory(){
        $tag = factory(Tag::class,5)->create();
        $tag->save();
    }
}
