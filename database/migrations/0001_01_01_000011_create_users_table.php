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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('first_lastname');
      $table->string('second_lastname')->nullable();
      $table->string('names');
      $table->date('birth_date')->nullable();
      $table->unsignedBigInteger('document_type_id');
      $table->unsignedBigInteger('gender_id');
      $table->string('document_number');
      $table->boolean('child_condition')->default(false);
      $table->string('cellphone_number')->nullable();
      $table->string('email')->unique();
      $table->string('password');
      $table->timestamps();

      $table->foreign('document_type_id')->references('id')->on('document_types');
      $table->foreign('gender_id')->references('id')->on('genders');
    });

    Schema::create('sessions', function (Blueprint $table) {
      $table->string('id')->primary();
      $table->foreignId('user_id')->nullable()->index();
      $table->string('ip_address', 45)->nullable();
      $table->text('user_agent')->nullable();
      $table->longText('payload');
      $table->integer('last_activity')->index();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
    Schema::dropIfExists('sessions');
  }
};
