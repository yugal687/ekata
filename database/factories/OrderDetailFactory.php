<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\OrderDetail;
use App\Model\Order;
use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' =>1,
        'product_id' => 1,
        'price' => $faker->numberBetween(200, 390),
        'quantity' =>$faker->numberBetween(200, 390),
        'order_status' =>$faker->text(),
        'discount' =>$faker->numberBetween(200, 390),
        'user_id'=>1,
        'date'=>$faker->date(),
    ];
});
