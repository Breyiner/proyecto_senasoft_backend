<?php

namespace App\Http\Controllers\API\Flight;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Flight\StoreFlightRequest;
use App\Http\Requests\Flight\UpdateFlightRequest;
use App\Http\Requests\Flight\PartialUpdateFlightRequest;
use App\Services\Flight\FlightService;
use Illuminate\Http\Request;

class FlightController extends Controller
{
  protected $service;

  public function __construct(FlightService $service)
  {
    $this->service = $service;
  }

  public function index(Request $request)
  {

    $origen = $request->query('origen');
    $destino = $request->query('destino');
    $fecha = $request->query('fecha');

    $querys = [
      "origen" => $origen,
      "destino" => $destino,
      "fecha" => $fecha,
    ];

    $response = $this->service->getAll($querys);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function show(string $id)
  {
    $response = $this->service->getById($id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function store(StoreFlightRequest $request)
  {
    $data = $request->validated();

    $response = $this->service->create($data);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function update(UpdateFlightRequest $request, string $id)
  {
    $data = $request->validated();

    $response = $this->service->update($data, $id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function partialUpdate(PartialUpdateFlightRequest $request, string $id)
  {
    $data = $request->validated();

    $response = $this->service->partialUpdate($data, $id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function destroy(string $id)
  {
    $response = $this->service->delete($id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }
}
