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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('type');
            $table->string('room_number')->unique();
            $table->string('room_price');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('quantity');
            $table->string('price');
            $table->string('phone_number');
            $table->string('email');
            $table->string('message');
            $table->enum('status', ['unpaid','paid']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
