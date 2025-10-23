<?php

namespace Database\Seeders\Airport;

use App\Models\Airport\Airport;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Airport::create(['name' => 'Palonegro',        'city_id' => 1]);
    Airport::create(['name' => 'Aeropuerto local FLD', 'city_id' => 2]);
    Airport::create(['name' => 'Aeropuerto Girón',     'city_id' => 3]);
    Airport::create(['name' => 'Aeropuerto Piedecuesta', 'city_id' => 4]);
    Airport::create(['name' => 'Aeropuerto San Gil',    'city_id' => 5]);
    Airport::create(['name' => 'Aeropuerto Lebrija',    'city_id' => 6]);
  }
}
