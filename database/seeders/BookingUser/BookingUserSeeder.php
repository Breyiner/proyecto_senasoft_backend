<?php

namespace Database\Seeders\BookingUser;

use App\Models\Booking\Booking;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Supón reservas y usuarios existentes
    // Reserva 1: usuarios 1 (asiento 12) y 2 (13)
    $booking1 = Booking::find(1);
    $booking1->users()->attach([
      1 => ['seat_number' => '12'],
      2 => ['seat_number' => '13'],
    ]);

    // Reserva 2: usuario 3 (15)
    $booking2 = Booking::find(2);
    $booking2->users()->attach([
      3 => ['seat_number' => '15'],
    ]);

    // Reserva 3: usuarios 4 (8) y 5 (9)
    $booking3 = Booking::find(3);
    $booking3->users()->attach([
      4 => ['seat_number' => '8'],
      5 => ['seat_number' => '9'],
    ]);

    // Puedes seguir agregando reservas y asientos según tus datos de prueba
  }
}
