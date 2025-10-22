<?php

namespace App\Models\DocumentType;

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
}
