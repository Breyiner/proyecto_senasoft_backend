<?php

namespace App\Services\Booking;

use App\Models\Booking\Booking;
use Illuminate\Support\Arr;

class BookingService
{
  public static function getAll()
  {
    $bookings = Booking::all();

    if ($bookings->isEmpty()) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay reservas registradas",
        "data" => $bookings,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Reservas obtenidas con éxito",
      "data" => $bookings,
    ];
  }

  public function getById($id)
  {
    $booking = Booking::find($id);

    if (!$booking) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Reserva no encontrada",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Reserva obtenida con éxito",
      "data" => $booking,
    ];
  }

  public function create(array $data)
  {
    $booking = Booking::create($data);

    $booking->users()->attach([
      $data['user_id'] => ['seat_number' => $data['seat']],
    ]);

    $booking = [
      $booking,
      $booking->users,
    ];

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Reserva creada con éxito',
      'data' => $booking,
    ];
  }

  public function update(array $data, $id)
  {
    $booking = Booking::find($id);

    if (!$booking) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Reserva no encontrada",
      ];
    }

    $booking->update(Arr::only($data, [
      'payment_id',
      'flight_id'
    ]));

    return [
      "error" => false,
      "code" => 200,
      "message" => "Reserva actualizada con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $booking = Booking::find($id);

    if (!$booking) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Reserva no encontrada",
      ];
    }

    $booking->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Reserva actualizada con éxito",
    ];
  }

  public function delete($id)
  {
    $booking = Booking::find($id);

    if (!$booking) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Reserva no encontrada",
      ];
    }

    $booking->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Reserva eliminada con éxito",
    ];
  }
}