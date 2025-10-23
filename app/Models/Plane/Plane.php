<?php

namespace App\Models\Plane;

use App\Models\Flight\Flight;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'airline',
    'seats_amount',
    'model',
  ];

  public function flights()
  {
    return $this->hasMany(Flight::class);
  }
}