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
        Schema::create('owner_hotels', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('identity_id');
            $table->foreign('identity_id')->references('id')->on('identity_types')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('nationality_id');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
           
            $table->unsignedBigInteger('identity_no');
           
           
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
        Schema::dropIfExists('owner_hotels');
    }
};
