<?php

namespace App\Models\Plane;

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
}