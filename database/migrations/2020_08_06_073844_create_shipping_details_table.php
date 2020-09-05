<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('address');
            $table->string('optional_address');
            $table->string('contact_number');
            $table->string('email');
            $table->string('city');
            $table->string('postal_code');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('shipping_details');
    }
}
