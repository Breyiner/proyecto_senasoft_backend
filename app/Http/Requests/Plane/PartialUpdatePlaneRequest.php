<?php

namespace App\Http\Requests\Plane;

use Illuminate\Foundation\Http\FormRequest;

class PartialUpdatePlaneRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    $planeId = $this->route('plane');
    return [
      'name' => 'sometimes|string|max:255|unique:planes,name,' . $planeId,
      'airline' => 'sometimes|string|max:255',
      'seats_amount' => 'sometimes|integer|min:1',
      'model' => 'sometimes|string|max:255',
    ];
  }

  public function messages(): array
  {
    return [
      'name.string' => 'El :attribute debe ser texto.',
      'name.max' => 'El :attribute no debe tener más de :max caracteres.',
      'name.unique' => 'Ya existe un avión con ese :attribute.',

      'airline.string' => 'La :attribute debe ser texto.',
      'airline.max' => 'La :attribute no debe tener más de :max caracteres.',

      'seats_amount.integer' => 'La :attribute debe ser un número entero.',
      'seats_amount.min' => 'La :attribute debe ser mayor a cero.',

      'model.string' => 'El attribute debe ser texto.',
      'model.max' => 'El attribute no debe tener más de :max caracteres.',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'nombre',
      'airline' => 'aerolínea',
      'seats_amount' => 'cantidad de asientos',
      'model' => 'modelo',
    ];
  }
}
