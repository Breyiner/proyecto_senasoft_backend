<?php

namespace Database\Seeders\Payment;

use App\Models\Payment\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Payment::create([
      'payer_name' => 'Ana Rivera',
      'document_type_id' => 1,
      'document_number' => '1024356789',
      'email' => 'ana.rivera@example.com',
      'phone' => '3124567890',
      'payment_method_id' => 1,
    ]);
    Payment::create([
      'payer_name' => 'Carlos Jiménez',
      'document_type_id' => 2,
      'document_number' => '4587961230',
      'email' => 'carlos.j@example.com',
      'phone' => '3101234567',
      'payment_method_id' => 2,
    ]);
    Payment::create([
      'payer_name' => 'María López',
      'document_type_id' => 3,
      'document_number' => '9054321786',
      'email' => 'marialopez@mail.com',
      'phone' => '3006789456',
      'payment_method_id' => 2,
    ]);
    Payment::create([
      'payer_name' => 'Juan Torres',
      'document_type_id' => 1,
      'document_number' => '4432109876',
      'email' => 'juan.torres@example.net',
      'phone' => '3019876543',
      'payment_method_id' => 2,
    ]);
    Payment::create([
      'payer_name' => 'Lucía Carvajal',
      'document_type_id' => 2,
      'document_number' => '1122334455',
      'email' => 'lucia.carvajal@mail.com',
      'phone' => '3154321876',
      'payment_method_id' => 2,
    ]);
  }
}