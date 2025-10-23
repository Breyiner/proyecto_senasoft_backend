<?php

namespace App\Services\Airport;

use App\Models\Airport\Airport;
use Illuminate\Support\Arr;

class AirportService
{
  public static function getAll()
  {
    $airports = Airport::all();

    if ($airports->isEmpty()) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay aeropuertos registrados",
        "data" => $airports,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Aeropuertos obtenidos con éxito",
      "data" => $airports,
    ];
  }

  public function getById($id)
  {
    $airport = Airport::find($id);

    if (!$airport) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Aeropuerto no encontrado",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Aeropuerto obtenido con éxito",
      "data" => $airport,
    ];
  }

  public function create(array $data)
  {
    $airport = Airport::create($data);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Aeropuerto creado con éxito',
      'data' => $airport,
    ];
  }

  public function update(array $data, $id)
  {
    $airport = Airport::find($id);

    if (!$airport) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Aeropuerto no encontrado",
      ];
    }

    $airport->update(Arr::only($data, ['name', 'city_id']));

    return [
      "error" => false,
      "code" => 200,
      "message" => "Aeropuerto actualizado con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $airport = Airport::find($id);

    if (!$airport) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Aeropuerto no encontrado",
      ];
    }

    $airport->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Aeropuerto actualizado con éxito",
    ];
  }

  public function delete($id)
  {
    $airport = Airport::find($id);

    if (!$airport) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Aeropuerto no encontrado",
      ];
    }

    $airport->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Aeropuerto eliminado con éxito",
    ];
  }
}
