<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'payment_id' => 'required|exists:payments,id',
      'flight_id' => 'required|exists:flights,id',
      'seat' => 'required',
      'user_id' => 'required'
    ];
  }

  public function messages(): array
  {
    return [
      'payment_id.required' => 'El :attribute es obligatorio.',
      'payment_id.exists' => 'El :attribute seleccionado no es válido.',
      
      'flight_id.required' => 'El :attribute es obligatorio.',
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