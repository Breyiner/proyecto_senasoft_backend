<?php

namespace App\Services\Payment;

use App\Models\Payment\Payment;
use Illuminate\Support\Arr;

class PaymentService
{
  public static function getAll()
  {
    $payments = Payment::all();

    if ($payments->isEmpty()) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay pagos registrados",
        "data" => $payments,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Pagos obtenidos con éxito",
      "data" => $payments,
    ];
  }

  public function getById($id)
  {
    $payment = Payment::find($id);

    if (!$payment) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Pago no encontrado",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Pago obtenido con éxito",
      "data" => $payment,
    ];
  }

  public function create(array $data)
  {
    $payment = Payment::create($data);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Pago creado con éxito',
      'data' => $payment,
    ];
  }

  public function update(array $data, $id)
  {
    $payment = Payment::find($id);

    if (!$payment) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Pago no encontrado",
      ];
    }

    $payment->update(Arr::only($data, [
      'payer_name',
      'document_type_id',
      'document_number',
      'email',
      'phone',
      'payment_method_id'
    ]));

    return [
      "error" => false,
      "code" => 200,
      "message" => "Pago actualizado con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $payment = Payment::find($id);

    if (!$payment) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Pago no encontrado",
      ];
    }

    $payment->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Pago actualizado con éxito",
    ];
  }

  public function delete($id)
  {
    $payment = Payment::find($id);

    if (!$payment) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Pago no encontrado",
      ];
    }

    $payment->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Pago eliminado con éxito",
    ];
  }
}
