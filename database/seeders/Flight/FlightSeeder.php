<?php

namespace Database\Seeders\Flight;

use App\Models\Flight\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Flight::create([
      'plane_id' => 1,
      'origin_city_id' => 1,       
      'destination_city_id' => 2,  
      'departure_date' => '2025-11-01',
      'departure_time' => '09:30',
      'duration_hours' => 1,
    ]);
    Flight::create([
      'plane_id' => 2,
      'origin_city_id' => 2,       
      'destination_city_id' => 3,  
      'departure_date' => '2025-11-02',
      'departure_time' => '12:45',
      'duration_hours' => 2,
    ]);
    Flight::create([
      'plane_id' => 3,
      'origin_city_id' => 3,       
      'destination_city_id' => 4,  
      'departure_date' => '2025-11-03',
      'departure_time' => '15:20',
      'duration_hours' => 1,
    ]);
    Flight::create([
      'plane_id' => 4,
      'origin_city_id' => 4,       
      'destination_city_id' => 5,  
      'departure_date' => '2025-11-04',
      'departure_time' => '07:50',
      'duration_hours' => 2,
    ]);
    Flight::create([
      'plane_id' => 1,
      'origin_city_id' => 5,       
      'destination_city_id' => 6, 
      'departure_date' => '2025-11-05',
      'departure_time' => '20:00',
      'duration_hours' => 3,
    ]);
  }
}