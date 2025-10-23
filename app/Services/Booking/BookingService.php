<?php

namespace App\Services\Booking;

use App\Models\Booking\Booking;
use App\Models\User\User;
use Carbon\Carbon;
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

  public function getTicket($user_id)
  {
    $user = User::with(['booking.flight.originCity', 'booking.flight.destinationCity', 'booking.flight.plane'])
      ->find($user_id);

    if (!$user) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Usuario no encontrado",
      ];
    }

    $tickets = [];

    foreach ($user->booking as $booking) {
      $flight = $booking->flight;

      $pivotData = $booking->users()->where('users.id', $user_id)->first()->pivot;

      $tickets[] = [
        'passenger_name' => $user->names . ' ' . $user->first_lastname . ' ' . $user->second_lastname,
        'document_number' => $user->document_number,
        'flight' => [
          'origin' => $flight->originCity->name,
          'destination' => $flight->destinationCity->name,
          'plane' => $flight->plane->model ?? '',
          'departure_date' => $flight->departure_date,
          'departure_time' => $flight->departure_time,
          "landing_time" => Carbon::parse($flight->departure_time)->addHours($flight->duration_hours)->format('H:i:s'),
          "duration_hours" => $flight->duration_hours,
          'seat_number' => $pivotData->seat_number ?? null,
        ],
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Ticket obtenido con éxito",
      "data" => $tickets,
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
