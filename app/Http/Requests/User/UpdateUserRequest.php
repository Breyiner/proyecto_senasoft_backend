<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    $userId = $this->route('user');

    return [
      'first_lastname'      => 'required|string|max:50',
      'second_lastname'     => 'nullable|string|max:50',
      'names'               => 'required|string|max:100',
      'birth_date'          => 'nullable|date',
      'document_type_id'    => 'required|exists:document_types,id',
      'gender_id'           => 'required|exists:genders,id',
      'document_number'     => 'required|string|max:30|unique:users,document_number,' . $userId,
      'child_condition'     => 'boolean',
      'cellphone_number'    => 'nullable|string|max:20',
      'email'               => 'required|email|unique:users,email,' . $userId,
      'password'            => 'nullable|string|min:6|confirmed',
    ];
  }

  public function messages(): array
  {
    return [
      'first_lastname.required'      => 'El :attribute es obligatorio.',
      'first_lastname.string'        => 'El :attribute debe ser texto.',
      'first_lastname.max'           => 'El :attribute no debe tener más de :max caracteres.',

      'second_lastname.string'       => 'El :attribute debe ser texto.',
      'second_lastname.max'          => 'El :attribute no debe tener más de :max caracteres.',

      'names.required'               => 'El :attribute es obligatorio.',
      'names.string'                 => 'El :attribute debe ser texto.',
      'names.max'                    => 'El :attribute no debe tener más de :max caracteres.',

      'birth_date.date'              => 'El :attribute debe ser una fecha válida.',

      'document_type_id.required'    => 'El :attribute es obligatorio.',
      'document_type_id.exists'      => 'El :attribute seleccionado no es válido.',

      'gender_id.required'           => 'El :attribute es obligatorio.',
      'gender_id.exists'             => 'El :attribute seleccionado no es válido.',

      'document_number.required'     => 'El :attribute es obligatorio.',
      'document_number.string'       => 'El :attribute debe ser texto.',
      'document_number.max'          => 'El :attribute no debe tener más de :max caracteres.',
      'document_number.unique'       => 'El :attribute ya está registrado.',

      'child_condition.boolean'      => 'El :attribute debe ser verdadero o falso.',

      'cellphone_number.string'      => 'El :attribute debe ser texto.',
      'cellphone_number.max'         => 'El :attribute no debe tener más de :max caracteres.',

      'email.required'               => 'El :attribute es obligatorio.',
      'email.email'                  => 'El :attribute debe ser válido.',
      'email.unique'                 => 'El :attribute ya está registrado.',

      'password.required'            => 'La :attribute es obligatoria.',
      'password.string'              => 'La :attribute debe ser texto.',
      'password.min'                 => 'La :attribute debe tener al menos :min caracteres.',
    ];
  }

  public function attributes(): array
  {
    return [
      'first_lastname'   => 'primer apellido',
      'second_lastname'  => 'segundo apellido',
      'names'            => 'nombres',
      'birth_date'       => 'fecha de nacimiento',
      'document_type_id' => 'tipo de documento',
      'gender_id'        => 'género',
      'document_number'  => 'número de documento',
      'child_condition'  => 'condición de infante',
      'cellphone_number' => 'número celular',
      'email'            => 'correo electrónico',
      'password'         => 'contraseña',
    ];
  }
}
