<?php

namespace App\Services\PaymentMethod;

use App\Models\PaymentMethod\PaymentMethod;
use Illuminate\Support\Arr;

class PaymentMethodService
{
  public static function getAll()
  {
    $methods = PaymentMethod::all();

    if ($methods->isEmpty()) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay métodos de pago registrados",
        "data" => $methods,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Métodos de pago obtenidos con éxito",
      "data" => $methods,
    ];
  }

  public function getById($id)
  {
    $method = PaymentMethod::find($id);

    if (!$method) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Método de pago no encontrado",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Método de pago obtenido con éxito",
      "data" => $method,
    ];
  }

  public function create(array $data)
  {
    $method = PaymentMethod::create($data);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Método de pago creado con éxito',
      'data' => $method,
    ];
  }

  public function update(array $data, $id)
  {
    $method = PaymentMethod::find($id);

    if (!$method) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Método de pago no encontrado",
      ];
    }

    $method->update(Arr::only($data, ['name']));

    return [
      "error" => false,
      "code" => 200,
      "message" => "Método de pago actualizado con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $method = PaymentMethod::find($id);

    if (!$method) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Método de pago no encontrado",
      ];
    }

    $method->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Método de pago actualizado con éxito",
    ];
  }

  public function delete($id)
  {
    $method = PaymentMethod::find($id);

    if (!$method) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Método de pago no encontrado",
      ];
    }

    $method->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Método de pago eliminado con éxito",
    ];
  }
}
