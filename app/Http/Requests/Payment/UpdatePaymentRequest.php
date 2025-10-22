<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'payer_name' => 'required|string|max:100',
      'document_type_id' => 'required|exists:document_types,id',
      'document_number' => 'required|string|max:30',
      'email' => 'nullable|email|max:100',
      'phone' => 'nullable|string|max:20',
    ];
  }

  public function messages(): array
  {
    return [
      'payer_name.required' => 'El :attribute es obligatorio.',
      'payer_name.string' => 'El :attribute debe ser texto.',
      'payer_name.max' => 'El :attribute no debe tener más de :max caracteres.',

      'document_type_id.required' => 'El :attribute es obligatorio.',
      'document_type_id.exists' => 'El :attribute seleccionado no es válido.',

      'document_number.required' => 'El :attribute es obligatorio.',
      'document_number.string' => 'El :attribute debe ser texto.',
      'document_number.max' => 'El :attribute no debe tener más de :max caracteres.',

      'email.email' => 'El :attribute debe ser válido.',
      'email.max' => 'El :attribute no debe tener más de :max caracteres.',

      'phone.string' => 'El :attribute debe ser texto.',
      'phone.max' => 'El :attribute no debe tener más de :max caracteres.',
    ];
  }

  public function attributes(): array
  {
    return [
      'payer_name' => 'nombre del pagador',
      'document_type_id' => 'tipo de documento',
      'document_number' => 'número de documento',
      'email' => 'correo',
      'phone' => 'teléfono',
    ];
  }
}
