<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id'=>1,
        'brand_id'=>1,
        'product_name' => $faker->name(max(20)),
        'price'=> $faker->numberBetween(200, 390),
        'sale_price'=>$faker->numberBetween(2000, 3000),
        'additional_information' => $faker->text(max(100)),
        'quantity'=> $faker->numberBetween(10, 20),
        'discount'=> 0,
    ];
});
