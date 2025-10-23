<?php

namespace App\Models\Flight;

use App\Models\Booking\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plane\Plane;
use App\Models\City\City;

class Flight extends Model
{
  use HasFactory;

  protected $fillable = [
    'plane_id',
    'origin_city_id',
    'destination_city_id',
    'departure_date',
    'departure_time',
    'duration_hours',
    'price',
  ];

  public function plane()
  {
    return $this->belongsTo(Plane::class);
  }

  public function originCity()
  {
    return $this->belongsTo(City::class, 'origin_city_id');
  }

  public function destinationCity()
  {
    return $this->belongsTo(City::class, 'destination_city_id');
  }

  public function bookings()
  {
    return $this->hasMany(Booking::class);
  }
}
