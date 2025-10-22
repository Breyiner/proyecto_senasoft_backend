<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'email' => 'required|email',
      'password' => 'required|string|min:8|max:20',
    ];
  }

  /**

   * Get the error messages for the defined validation rules.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'email.required' => 'El :attribute es obligatorio',
      'password.required' => 'La :attribute es obligatoria',

      'password.min' => 'La :attribute debe tener al menos :min caracteres.',
      'password.max' => 'La :attribute no debe tener más de :max caracteres',

      'password.string' => 'La :attribute debe ser texto',
      'email.string' => 'El :attribute debe ser tener el formato correcto',
    ];
  }

  /**
   * Get custom attributes for validator errors.
   *
   * @return array<string, string>
   */
  public function attributes(): array
  {
    return [
      'email' => 'correo electrónico',
      'password' => 'contraseña'
    ];
  }
}
