<?php

namespace App\Http\Requests\Flight;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFlightRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'plane_id' => 'required|exists:planes,id',
      'origin_city_id' => 'required|exists:cities,id',
      'destination_city_id' => 'required|exists:cities,id|different:origin_city_id',
      'departure_date' => 'required|date',
      'departure_time' => 'required|date_format:H:i',
      'duration_hours' => 'required|integer|min:1',
      'price' => 'required|numeric|min:0',
    ];
  }

  public function messages(): array
  {
    return [
      'plane_id.required' => 'El :attribute es obligatorio.',
      'plane_id.exists' => 'El :attribute seleccionado no es válido.',

      'origin_city_id.required' => 'La :attribute es obligatoria.',
      'origin_city_id.exists' => 'La :attribute seleccionada no es válida.',

      'destination_city_id.required' => 'La :attribute es obligatoria.',
      'destination_city_id.exists' => 'La :attribute seleccionada no es válida.',
      'destination_city_id.different' => 'La :attribute debe ser diferente a la de origen.',

      'departure_date.required' => 'La :attribute es obligatoria.',
      'departure_date.date' => 'La :attribute debe ser válida.',

      'departure_time.required' => 'La :attribute es obligatoria.',
      'departure_time.date_format' => 'La :attribute debe tener formato HH:MM.',

      'duration_hours.required' => 'La :attribute es obligatoria.',
      'duration_hours.integer' => 'La :attribute debe ser un número entero en horas.',
      'duration_hours.min' => 'La :attribute debe ser al menos de 1 hora.',

      'price.required' => 'El :attribute es obligatorio.',
      'price.numeric' => 'El :attribute debe ser un valor numérico.',
      'price.min' => 'El :attribute debe ser mayor o igual a 0.',
    ];
  }

  public function attributes(): array
  {
    return [
      'plane_id' => 'avión',
      'origin_city_id' => 'ciudad de origen',
      'destination_city_id' => 'ciudad de destino',
      'departure_date' => 'fecha de despegue',
      'departure_time' => 'hora de despegue',
      'duration_hours' => 'duración en horas',
      'price' => 'precio',
    ];
  }
}
