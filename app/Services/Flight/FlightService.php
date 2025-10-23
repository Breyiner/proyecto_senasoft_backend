<?php

namespace App\Services\Flight;

use App\Models\Flight\Flight;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class FlightService
{
  public static function getAll($querys = null)
  {
    if (!$querys)
      $flights = Flight::all();

    else
      $flights = Flight::where('origin_city_id', $querys['origen'])
        ->where('destination_city_id', $querys['destino'])
        ->whereDate('departure_date', $querys['fecha'])
        ->get();

    if ($flights->isEmpty()) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay vuelos registrados",
        "data" => $flights,
      ];
    }

    $flights = $flights->map(function ($flight) {

      return [
        "id" => 3,
        "plane_id" => $flight->plane_id,
        "plane" => $flight->plane->name,
        "origin_city" => $flight->originCity->name,
        "destination_city" => $flight->destinationCity->name,
        "departure_date" => $flight->departure_date,
        "departure_time" => $flight->departure_time,
        "landing_time" => Carbon::parse($flight->departure_time)->addHours($flight->duration_hours)->format('H:i:s'),
        "duration_hours" => $flight->duration_hours,
        "price" => $flight->price,
      ];
    });

    return [
      "error" => false,
      "code" => 200,
      "message" => "Vuelos obtenidos con éxito",
      "data" => $flights,
    ];
  }

  public function getByUser($user_id) {

    $user = User::find($user_id);

    $bookings = $user->booking;

    $userFlights = $bookings->map(function ($booking) {
      return $booking->flight;
    });

    $flights = $userFlights->map(function ($flight) {

      return [
        "id" => 3,
        "plane_id" => $flight->plane_id,
        "plane" => $flight->plane->name,
        "origin_city" => $flight->originCity->name,
        "destination_city" => $flight->destinationCity->name,
        "departure_date" => $flight->departure_date,
        "departure_time" => $flight->departure_time,
        "landing_time" => Carbon::parse($flight->departure_time)->addHours($flight->duration_hours)->format('H:i:s'),
        "duration_hours" => $flight->duration_hours,
        "price" => $flight->price,
      ];
    });

    if (!$flights) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Vuelos no encontrados",
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
      'duration_hours',
      'price'
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
