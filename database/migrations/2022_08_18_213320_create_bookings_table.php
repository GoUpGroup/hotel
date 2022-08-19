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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('reciption_id');
            $table->foreign('reciption_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
           
            $table->string('visitor_name');
            $table->unsignedBigInteger('identity_id');
            $table->foreign('identity_id')->references('id')->on('identity_types')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('identity_no')->unique();;

            $table->unsignedBigInteger('nationality_id');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('room_no');
             $table->integer('floor_no')->default(null);
            $table->integer('department_no')->nullable();
            $table->datetime('date_of_entry');
            $table->datetime('date_of_left');
            $table->boolean("is_active")->default(1);
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
        Schema::dropIfExists('bookings');
    }
};
