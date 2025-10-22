<?php

namespace App\Services\Plane;

use App\Models\Plane\Plane;
use Illuminate\Support\Arr;

class PlaneService
{
  public static function getAll()
  {
    $planes = Plane::all();

    if ($planes->isEmpty()) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay aviones registrados",
        "data" => $planes,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Aviones obtenidos con éxito",
      "data" => $planes,
    ];
  }

  public function getById($id)
  {
    $plane = Plane::find($id);

    if (!$plane) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Avión no encontrado",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Avión obtenido con éxito",
      "data" => $plane,
    ];
  }

  public function create(array $data)
  {
    $plane = Plane::create($data);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Avión creado con éxito',
      'data' => $plane,
    ];
  }

  public function update(array $data, $id)
  {
    $plane = Plane::find($id);

    if (!$plane) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Avión no encontrado",
      ];
    }

    $plane->update(Arr::only($data, ['name', 'airline', 'seats_amount', 'model']));

    return [
      "error" => false,
      "code" => 200,
      "message" => "Avión actualizado con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $plane = Plane::find($id);

    if (!$plane) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Avión no encontrado",
      ];
    }

    $plane->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Avión actualizado con éxito",
    ];
  }

  public function delete($id)
  {
    $plane = Plane::find($id);

    if (!$plane) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Avión no encontrado",
      ];
    }

    $plane->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Avión eliminado con éxito",
    ];
  }
}
