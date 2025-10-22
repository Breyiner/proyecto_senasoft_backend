<?php

namespace App\Http\Controllers\API\PaymentMethod;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentMethod\StorePaymentMethodRequest;
use App\Http\Requests\PaymentMethod\UpdatePaymentMethodRequest;
use App\Http\Requests\PaymentMethod\PartialUpdatePaymentMethodRequest;
use App\Services\PaymentMethod\PaymentMethodService;

class PaymentMethodController extends Controller
{
  protected $service;

  public function __construct(PaymentMethodService $service)
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

  public function store(StorePaymentMethodRequest $request)
  {
    $data = $request->validated();

    $response = $this->service->create($data);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function update(UpdatePaymentMethodRequest $request, string $id)
  {
    $data = $request->validated();

    $response = $this->service->update($data, $id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function partialUpdate(PartialUpdatePaymentMethodRequest $request, string $id)
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
