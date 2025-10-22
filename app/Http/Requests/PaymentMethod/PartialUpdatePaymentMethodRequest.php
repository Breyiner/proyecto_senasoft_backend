<?php

namespace App\Http\Requests\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;

class PartialUpdatePaymentMethodRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    $id = $this->route('payment_method');
    return [
      'name' => 'sometimes|string|max:100|unique:payment_methods,name,' . $id,
    ];
  }

  public function messages(): array
  {
    return [
      'name.string' => 'El :attribute debe ser texto.',
      'name.max' => 'El :attribute no debe tener más de :max caracteres.',
      'name.unique' => 'Ya existe un método de pago con ese :attribute.',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'nombre',
    ];
  }
}
