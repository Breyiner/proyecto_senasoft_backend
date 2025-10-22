<?php

namespace App\Models\DocumentType;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
  ];

  public function user()
  {
    return $this->hasMany(User::class);
  }
}
