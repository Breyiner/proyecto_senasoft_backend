<?php

namespace App\Http\Controllers\API\Airport;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Airport\StoreAirportRequest;
use App\Http\Requests\Airport\UpdateAirportRequest;
use App\Http\Requests\Airport\PartialUpdateAirportRequest;
use App\Services\Airport\AirportService;

class AirportController extends Controller
{
  protected $service;

  public function __construct(AirportService $service)
  {
    $this->service = $service;
  }

  public function index()
  {
    $response = $this->service->getAll();

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

  public function store(StoreAirportRequest $request)
  {
    $data = $request->validated();

    $response = $this->service->create($data);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function update(UpdateAirportRequest $request, string $id)
  {
    $data = $request->validated();

    $response = $this->service->update($data, $id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function partialUpdate(PartialUpdateAirportRequest $request, string $id)
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
