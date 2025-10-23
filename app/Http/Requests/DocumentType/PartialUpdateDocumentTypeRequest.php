<?php

namespace App\Http\Requests\DocumentType;

use Illuminate\Foundation\Http\FormRequest;

class PartialUpdateDocumentTypeRequest extends FormRequest
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
      'name' => 'sometimes|string|min:3|max:255|unique:document_types,name,' . $this->route('document_type'),
    ];
  }

  public function messages(): array
  {
    return [
      'name.string' => 'El :attribute debe ser en formato de texto.',
      'name.min' => 'El :attribute debe tener al menos :min caracteres.',
      'name.max' => 'El :attribute no debe tener más de :max caracteres.',
      'name.unique' => 'El :attribute ya existe.',
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
      'name' => 'nombre',
    ];
  }
}
