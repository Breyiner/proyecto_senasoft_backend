<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment\Payment;
use App\Models\Flight\Flight;
use App\Models\User\User;

class Booking extends Model
{
  use HasFactory;

  protected $fillable = [
    'payment_id',
    'flight_id',
    'seat',
    'user_id'
  ];

  public function payment()
  {
    return $this->belongsTo(Payment::class);
  }

  public function flight()
  {
    return $this->belongsTo(Flight::class);
  }

  public function users()
  {
    return $this->belongsToMany(User::class)
      ->withPivot('seat_number')
      ->withTimestamps();
  }
}
