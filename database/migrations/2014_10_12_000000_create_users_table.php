<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('full_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('permissions')->nullable();
            $table->string('last_login')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('bio')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('pic')->nullable();
            $table->string('country')->nullable();
            $table->string('user_state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('role')->nullable();
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
