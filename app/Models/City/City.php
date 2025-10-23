<?php

namespace App\Models\City;

use App\Models\Airport\Airport;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'IATA',
  ];

  public function airport()
  {
    return $this->hasOne(Airport::class);
  }
}
