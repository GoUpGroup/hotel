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
        Schema::create('escorts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')->onDelete('cascade');
            $table->string('escort_name');
            $table->unsignedBigInteger('identity_id');
            $table->foreign('identity_id')->references('id')->on('identity_types')->onUpdate('cascade')->onDelete('cascade'); 
            $table->unsignedBigInteger('identity_no')->unique();;
            $table->unsignedBigInteger('nationality_id');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('relation');
            $table->integer('room_no')->default(null);
            $table->integer('floor_no')->default(null);
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
        Schema::dropIfExists('escorts');
    }
};
