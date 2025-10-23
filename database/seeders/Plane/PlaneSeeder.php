<?php

namespace Database\Seeders\Plane;

use App\Models\Plane\Plane;
use Illuminate\Database\Seeder;

class PlaneSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Plane::create([
      'name' => 'Andean Eagle',
      'airline' => 'Celestis Air',
      'seats_amount' => 180,
      'model' => 'Airbus A320',
    ]);
    Plane::create([
      'name' => 'Santander Express',
      'airline' => 'Celestis Air',
      'seats_amount' => 150,
      'model' => 'Boeing 737-800',
    ]);
    Plane::create([
      'name' => 'Oriente Jet',
      'airline' => 'Celestis Air',
      'seats_amount' => 50,
      'model' => 'Embraer ERJ145',
    ]);
    Plane::create([
      'name' => 'Floridablanca Flyer',
      'airline' => 'Celestis Air',
      'seats_amount' => 70,
      'model' => 'ATR 72',
    ]);
  }
}