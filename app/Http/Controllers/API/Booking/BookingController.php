<?php

namespace App\Http\Controllers\API\Booking;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use App\Http\Requests\Booking\PartialUpdateBookingRequest;
use App\Services\Booking\BookingService;

class BookingController extends Controller
{
  protected $service;

  public function __construct(BookingService $service)
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

  public function bookingTicket($user_id) {
    $response = $this->service->getTicket($user_id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function store(StoreBookingRequest $request)
  {
    $data = $request->validated();

    $response = $this->service->create($data);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function update(UpdateBookingRequest $request, string $id)
  {
    $data = $request->validated();

    $response = $this->service->update($data, $id);

    if ($response['error'])
      return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
  }

  public function partialUpdate(PartialUpdateBookingRequest $request, string $id)
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