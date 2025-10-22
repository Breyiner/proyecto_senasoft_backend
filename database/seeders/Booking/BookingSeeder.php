<?php

namespace Database\Seeders\Booking;

use App\Models\Booking\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Booking::create([
      'payment_id' => 1,
      'flight_id' => 1,
    ]);
    Booking::create([
      'payment_id' => 2,
      'flight_id' => 2,
    ]);
    Booking::create([
      'payment_id' => 3,
      'flight_id' => 3,
    ]);
    Booking::create([
      'payment_id' => 4,
      'flight_id' => 4,
    ]);
    Booking::create([
      'payment_id' => 5,
      'flight_id' => 5,
    ]);
  }
}