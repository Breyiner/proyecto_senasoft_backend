<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Airport\AirportSeeder;
use Database\Seeders\Booking\BookingSeeder;
use Database\Seeders\BookingUser\BookingUserSeeder;
use Database\Seeders\City\CitySeeder;
use Database\Seeders\DocumentType\DocumentTypeSeeder;
use Database\Seeders\Flight\FlightSeeder;
use Database\Seeders\Gender\GenderSeeder;
use Database\Seeders\Payment\PaymentSeeder;
use Database\Seeders\PaymentMethod\PaymentMethodSeeder;
use Database\Seeders\Plane\PlaneSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

  /**
   * Seed the application's database.
   */
  public function run(): void
  {

    $this->call(
      [
        GenderSeeder::class,
        DocumentTypeSeeder::class,
        UserSeeder::class,
        CitySeeder::class,
        AirportSeeder::class,
        PlaneSeeder::class,
        FlightSeeder::class,
        PaymentMethodSeeder::class,
        PaymentSeeder::class,
        BookingSeeder::class,
        BookingUserSeeder::class,
    ]);
  }
}
