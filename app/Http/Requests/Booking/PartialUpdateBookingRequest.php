<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class PartialUpdateBookingRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'payment_id' => 'sometimes|exists:payments,id',
      'flight_id' => 'sometimes|exists:flights,id',
    ];
  }

  public function messages(): array
  {
    return [
      'payment_id.exists' => 'El :attribute seleccionado no es válido.',
      
      'flight_id.exists' => 'El :attribute seleccionado no es válido.',
    ];
  }

  public function attributes(): array
  {
    return [
      'payment_id' => 'pago',
      'flight_id' => 'vuelo',
    ];
  }
}