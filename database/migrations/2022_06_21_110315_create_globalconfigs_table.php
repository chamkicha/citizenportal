<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globalconfigs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sitename')->nullable();
            $table->string('email')->nullable();
            $table->string('phno')->nullable();
            $table->integer('customer_no')->default('100');
            $table->integer('reservation_no')->default('100');
            $table->integer('invoice_no')->default('100');
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('remark')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();    
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
        Schema::dropIfExists('globalconfigs');
    }
}
