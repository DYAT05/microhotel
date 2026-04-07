<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guest_information', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('guest_id')->nullable();
            $table ->unsignedBigInteger('frontdesk_id')->nullable();
            $table ->unsignedBigInteger('reservation_id');
            $table ->string('salutation');
            $table ->string('first_name');
            $table ->string('last_name');
            $table ->string('company_name')->nullable();
            $table ->string('address');
            $table ->string('phone_number');
            $table ->string('payment_method');
            $table ->string('payment_status');
            $table ->string('department')->nullable();  
            $table->softDeletes();  
            $table->timestamps();
            $table->foreign('guest_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
             $table->foreign('frontdesk_id')
            ->references('id')->on('frontdesk')
            ->onDelete('cascade');
            $table->foreign('reservation_id')
            ->references('id')->on('reservations')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_information');
    }
};
