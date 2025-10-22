<?php

namespace App\Services\DocumentType;

use App\Models\DocumentType\DocumentType;
use Illuminate\Support\Arr;

class DocumentTypeService
{
  public static function getAll()
  {
    $types = DocumentType::all();

    if (count($types) == 0) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay tipos de documento registrados",
        "data" => $types,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Tipos de documento obtenidos con éxito",
      "data" => $types,
    ];
  }

  public function getById($id)
  {
    $type = DocumentType::find($id);

    if (!$type) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Este tipo de documento no existe",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Tipo de documento obtenido con éxito",
      "data" => $type,
    ];
  }

  public function create(array $data)
  {
    $type = DocumentType::create([
      'name' => $data['name'],
    ]);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Tipo de documento creado con éxito',
      'data' => $type,
    ];
  }

  public function update(array $data, $id)
  {
    $type = DocumentType::find($id);

    if (!$type) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Este tipo de documento no existe",
      ];
    }

    $type->update(Arr::only($data, ['name']));

    return [
      "error" => false,
      "code" => 200,
      "message" => "Tipo de documento actualizado con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $type = DocumentType::find($id);

    if (!$type) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Este tipo de documento no existe",
      ];
    }

    $type->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Tipo de documento actualizado con éxito",
    ];
  }

  public function delete($id)
  {
    $type = DocumentType::find($id);

    if (!$type) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Este tipo de documento no existe",
      ];
    }

    if ($type->someRelation()->exists()) {
      return [
        "error" => true,
        "code" => 409,
        "message" => "No se puede eliminar el tipo de documento porque tiene relaciones activas",
      ];
    }

    $type->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Tipo de documento eliminado con éxito",
    ];
  }
}
