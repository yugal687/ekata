<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('shipping_address')->nullable();
            $table->string('sub_urb')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('registered_user');
            $table->string('email');
            $table->string('contact_number');
            $table->string('state')->nullable();
            $table->string('order_status')->nullable();
            $table->string('postal_code')->nullable();
            $table->double('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
