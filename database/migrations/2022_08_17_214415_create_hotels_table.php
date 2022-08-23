<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_hotel_id');
            $table->foreign('owner_hotel_id')->references('id')->on('owner_hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('hotel_phone')->nullable();
            $table->string('hotel_address');
            $table->string('hotelName');
            $table->smallInteger("is_active")->default(-1);
            $table->unsignedBigInteger('lisciens_no');
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
        Schema::dropIfExists('hotels');
    }
};
