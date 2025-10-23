<?php

namespace App\Models\Airport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City\City;

class Airport extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'city_id',
  ];

  public function city()
  {
    return $this->belongsTo(City::class);
  }
}
