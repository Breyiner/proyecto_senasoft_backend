<?php

namespace Database\Seeders\City;

use App\Models\City\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    City::create(['name' => 'Bucaramanga', 'iata' => 'BGA']);
    City::create(['name' => 'Floridablanca', 'iata' => 'FLD']);
    City::create(['name' => 'Girón', 'iata' => 'GIR']);
    City::create(['name' => 'Piedescuesta', 'iata' => 'PDS']);
    City::create(['name' => 'San Gil', 'iata' => 'SAN']);
    City::create(['name' => 'Lebrija', 'iata' => 'LEB']);
  }
}
