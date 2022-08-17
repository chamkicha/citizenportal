<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reservation_no')->nullable();
            $table->string('room_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('amount')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('due_amount')->nullable();
            $table->string('status')->nullable();
            $table->string('days')->nullable();
            $table->string('block_no')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('room_no')->nullable();
            $table->string('remark')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('adult')->nullable();
            $table->string('children')->nullable();
            $table->string('discount')->nullable();
            $table->string('extra_price')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
