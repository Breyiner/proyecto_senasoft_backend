<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Booking\Booking;
use App\Models\DocumentType\DocumentType;
use App\Models\Gender\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory, Notifiable, HasApiTokens, HasRoles;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'first_lastname',
    'second_lastname',
    'names',
    'birth_date',
    'document_type_id',
    'gender_id',
    'document_number',
    'child_condition',
    'cellphone_number',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'password' => 'hashed',
    ];
  }

  public function gender() {
    return $this->belongsTo(Gender::class);
  }

  public function documentType() {
    return $this->belongsTo(DocumentType::class);
  }

  public function booking()
  {
    return $this->belongsToMany(Booking::class)
      ->withPivot('seat_number')
      ->withTimestamps();
  }
}
