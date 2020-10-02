<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_details', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('contact_number');
            $table->string('address');
            $table->string('additional_information')->nullable();
            $table->string('optional_email')->nullable();
            $table->string('optional_contact')->nullable();
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
        Schema::dropIfExists('website_details');
    }
}
