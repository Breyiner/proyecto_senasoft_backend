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
    Schema::create('flights', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('plane_id');
      $table->unsignedBigInteger('origin_city_id');
      $table->unsignedBigInteger('destination_city_id');
      $table->date('departure_date');
      $table->time('departure_time');
      $table->integer('duration_hours');
      $table->decimal('price', 10, 2);
      $table->timestamps();

      $table->foreign('plane_id')->references('id')->on('planes');
      $table->foreign('origin_city_id')->references('id')->on('cities');
      $table->foreign('destination_city_id')->references('id')->on('cities');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('flights');
  }
};
