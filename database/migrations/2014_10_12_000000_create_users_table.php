<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name')->unique();
            $table->string('email')->nullable();
            $table->integer('role')->default(2);
            $table->timestamp('email_verified_at')->default(now());
            $table->string('password');
            $table->string('address')>nullable();
            $table->int('phone')->nullable();
            $table->int('mobile')->nullable();
            $table->boolean('is_active')->default(1);
            $table->rememberToken()->default(Str::random(10));
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
        Schema::dropIfExists('users');
    }
};
