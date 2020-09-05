<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\OrderDetail;
use App\Model\Order;
use App\Model\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    $user = User::pluck('id')->toArray();
    $order = Order::pluck('id')->toArray();
    $product = Product::pluck('id')->toArray();
    return [
        'order_id' =>$faker->randomElement($order),
        'product_id' => $faker->randomElement($product),
        'price' => $faker->numberBetween(200, 390),
        'quantity' =>$faker->numberBetween(200, 390),
        'order_status' =>$faker->text(),
        'discount' =>$faker->numberBetween(200, 390),
        'user_id'=>$faker->randomElement($user),
        'date'=>$faker->date(),
    ];
});
