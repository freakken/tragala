<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->unique()->nullable();
            $table->string('avatar')->default('http://localhost:8000/images/avatar.jpg')->nullable();
            $table->string('gender',6);
            $table->string('banner')->default('http://localhost:8000/images/banner.jpg')->nullable();
            $table->string('location')->nullable();
            $table->string('hash');
            $table->boolean('verified')->default(0);
            $table->boolean('activated')->default(0);
            $table->integer('usergroup')->default(1);
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
}
