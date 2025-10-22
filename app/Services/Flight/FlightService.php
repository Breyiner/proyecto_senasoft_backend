<?php

namespace App\Services\Flight;

use App\Models\Flight\Flight;
use Illuminate\Support\Arr;

class FlightService
{
  public static function getAll()
  {
    $flights = Flight::all();

    if ($flights->isEmpty()) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay vuelos registrados",
        "data" => $flights,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Vuelos obtenidos con éxito",
      "data" => $flights,
    ];
  }

  public function getById($id)
  {
    $flight = Flight::find($id);

    if (!$flight) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Vuelo no encontrado",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Vuelo obtenido con éxito",
      "data" => $flight,
    ];
  }

  public function create(array $data)
  {
    $flight = Flight::create($data);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Vuelo creado con éxito',
      'data' => $flight,
    ];
  }

  public function update(array $data, $id)
  {
    $flight = Flight::find($id);

    if (!$flight) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Vuelo no encontrado",
      ];
    }

    $flight->update(Arr::only($data, [
      'plane_id',
      'origin_city_id',
      'destination_city_id',
      'departure_date',
      'departure_time',
      'duration_hours'
    ]));

    return [
      "error" => false,
      "code" => 200,
      "message" => "Vuelo actualizado con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $flight = Flight::find($id);

    if (!$flight) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Vuelo no encontrado",
      ];
    }

    $flight->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Vuelo actualizado con éxito",
    ];
  }

  public function delete($id)
  {
    $flight = Flight::find($id);

    if (!$flight) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Vuelo no encontrado",
      ];
    }

    $flight->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Vuelo eliminado con éxito",
    ];
  }
}