<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_number'=>$faker->numberBetween(200, 390),
        'total_price' =>$faker->numberBetween(200, 390),
    ];
});
