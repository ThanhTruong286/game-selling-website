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
            $table->string('fullname',50);
            $table->string('phone',50);
            $table->string('provice_id',50);//ma thanh pho
            $table->string('district_id',50);//ma quan
            $table->string('ward_id',50);//ma quan
            $table->string('address',50);//ma quan
            $table->string('ward_id',50);//ma quan
            $table->dateTime('birthday');
            $table->string('image',50);
            $table->string('description',100);//ma quan
            $table->text('user_agent');
            $table->text('ip');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
