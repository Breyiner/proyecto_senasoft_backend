<?php

namespace App\Http\Requests\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentMethodRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    $id = $this->route('payment_method');
    return [
      'name' => 'required|string|max:100|unique:payment_methods,name,' . $id,
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'El :attribute del método de pago es obligatorio.',
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
