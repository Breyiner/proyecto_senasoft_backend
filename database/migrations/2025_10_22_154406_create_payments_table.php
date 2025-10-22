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
    Schema::create('payments', function (Blueprint $table) {
      $table->id();
      $table->string('payer_name', 100);
      $table->unsignedBigInteger('document_type_id');
      $table->string('document_number');
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->unsignedBigInteger('payment_method_id');
      $table->timestamps();

      $table->foreign('document_type_id')->references('id')->on('document_types');
      $table->foreign('payment_method_id')->references('id')->on('payment_methods');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('payments');
  }
};
