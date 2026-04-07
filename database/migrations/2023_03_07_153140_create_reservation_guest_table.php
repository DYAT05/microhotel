<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table ->id();
            $table ->unsignedBigInteger('guest_id')->nullable();
            $table ->unsignedBigInteger('frontdesk_id')->nullable();
            $table ->unsignedBigInteger('room_id');
            $table ->string('booking_status');
            $table ->string('booking_types');
            $table ->integer('nights');
            $table ->date('checkin_date');
            $table ->date('checkout_date');
            $table ->decimal('base_price',8,3);
            $table ->decimal('total_price',8,3);
            $table ->integer('guests_num');
            $table ->integer('additional_guests');
            $table ->decimal('guests_Fee',8,3);
            $table->softDeletes(); 
            $table->timestamps();
            $table->foreign('guest_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
             $table->foreign('frontdesk_id')
            ->references('id')->on('frontdesks')
            ->onDelete('cascade');
            $table->foreign('room_id')
            ->references('id')->on('manage_room')
            ->onDelete('cascade');
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
};
