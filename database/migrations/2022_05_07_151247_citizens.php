<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Citizens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nida')->nullable();
            $table->string('tin')->nullable();
            $table->string('passport')->nullable();
            $table->string('nhif_id')->nullable();
            $table->string('o_level_no')->nullable();
            $table->string('advance_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('pic')->nullable();
            $table->string('country')->nullable();
            $table->string('user_state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('tribe')->nullable();
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
        //
    }
}
