<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentType\DocumentType;
use App\Models\PaymentMethod\PaymentMethod;

class Payment extends Model
{
  use HasFactory;

  protected $fillable = [
    'payer_name',
    'document_type_id',
    'document_number',
    'email',
    'phone',
    'payment_method_id',
    'price'
  ];

  public function documentType()
  {
    return $this->belongsTo(DocumentType::class);
  }
  
}
