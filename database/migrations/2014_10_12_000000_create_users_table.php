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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fullname',50)->nullable(true);
            $table->string('phone',50)->nullable(true);
            $table->string('province',50)->nullable(true);//ma thanh pho
            $table->string('district',50)->nullable(true);//ma quan
            $table->string('ward',50)->nullable(true);//ma quan
            $table->string('address',50)->nullable(true);//ma quan
            $table->dateTime('birthday')->nullable(true);
            $table->string('image',50)->nullable(true);
            $table->string('description',100)->nullable(true);//ma quan
            $table->text('user_agent')->nullable(true);
            $table->text('ip')->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('roles');
            $table->integer('dev_id')->nullable();
            // $table->integer('library_id');
            $table->foreign('dev_id')->references('id')->on('developers')->onDelete('cascade');
            $table->rememberToken();
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
