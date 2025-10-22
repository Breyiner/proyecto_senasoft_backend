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
      $table->unsignedBigInteger('payment_id');
      $table->unsignedBigInteger('flight_id');
      $table->timestamps();

      $table->foreign('payment_id')->references('id')->on('payments');
      $table->foreign('flight_id')->references('id')->on('flights');
    });

    Schema::create('booking_user', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('booking_id');
      $table->unsignedBigInteger('user_id');
      $table->string('seat_number');
      $table->timestamps();

      $table->foreign('booking_id')->references('id')->on('bookings');
      $table->foreign('user_id')->references('id')->on('users');
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
