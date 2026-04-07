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
        Schema::create('manage_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_number');
            $table->text('room_description')->default('No description available')->nullable();
            $table->string('room_type');
            $table->integer('max_capacity');
            $table->string('amenities');
            $table->string('status');
            $table->decimal('rate', 8, 2);
            $table->string('photos', 300)->default('No photos available')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_rooms');
    }
};
