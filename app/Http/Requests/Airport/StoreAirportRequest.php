<?php

namespace App\Http\Requests\Airport;

use Illuminate\Foundation\Http\FormRequest;

class StoreAirportRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|string|max:255|unique:airports,name',
      'city_id' => 'required|exists:cities,id',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'El :attribute del aeropuerto es obligatorio.',
      'name.string' => 'El :attribute debe ser texto.',
      'name.max' => 'El :attribute no debe tener más de :max caracteres.',
      'name.unique' => 'Ya existe un aeropuerto con ese :attribute.',
      'city_id.required' => 'La :attribute es obligatoria.',
      'city_id.exists' => 'La :attribute seleccionada no es válida.',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'nombre',
      'city_id' => 'ciudad',
    ];
  }
}
