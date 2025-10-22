<?php

namespace Database\Seeders\PaymentMethod;

use App\Models\PaymentMethod\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    PaymentMethod::create(['name' => 'Tarjeta de crédito']);
    PaymentMethod::create(['name' => 'Tarjeta de débito']);
  }
}
