<?php

use App\Enums\TokenAbility;
use App\Http\Controllers\API\Airport\AirportController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Booking\BookingController;
use App\Http\Controllers\API\City\CityController;
use App\Http\Controllers\API\DocumentType\DocumentTypeController;
use App\Http\Controllers\API\Flight\FlightController;
use App\Http\Controllers\API\Gender\GenderController;
use App\Http\Controllers\API\Payment\PaymentController;
use App\Http\Controllers\API\PaymentMethod\PaymentMethodController;
use App\Http\Controllers\API\Plane\PlaneController;
use App\Http\Controllers\API\User\UserController;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('genders')->group(function () {
  Route::get('/', [GenderController::class, 'index']);

  Route::get('/{gender_id}', [GenderController::class, 'show']);

  Route::post('/', [GenderController::class, 'store']);

  Route::put('/{gender_id}', [GenderController::class, 'update']);

  Route::patch('/{gender_id}', [GenderController::class, 'partialUpdate']);

  Route::delete('/{gender_id}', [GenderController::class, 'destroy']);
});


Route::prefix('document_types')->group(function () {
  Route::get('/', [DocumentTypeController::class, 'index']);

  Route::get('/{document_type}', [DocumentTypeController::class, 'show']);

  Route::post('/', [DocumentTypeController::class, 'store']);

  Route::put('/{document_type}', [DocumentTypeController::class, 'update']);

  Route::patch('/{document_type}', [DocumentTypeController::class, 'partialUpdate']);

  Route::delete('/{document_type}', [DocumentTypeController::class, 'destroy']);
});


Route::prefix('users')->group(function () {
  Route::get('/', [UserController::class, 'index']);

  Route::get('/{user}', [UserController::class, 'show']);

  Route::post('/', [UserController::class, 'store']);

  Route::put('/{user}', [UserController::class, 'update']);

  Route::patch('/{user}', [UserController::class, 'partialUpdate']);

  Route::delete('/{user}', [UserController::class, 'destroy']);
});

Route::prefix('cities')->group(function () {
  Route::get('/', [CityController::class, 'index']);

  Route::get('/{city_id}', [CityController::class, 'show']);

  Route::post('/', [CityController::class, 'store']);

  Route::put('/{city_id}', [CityController::class, 'update']);

  Route::patch('/{city_id}', [CityController::class, 'partialUpdate']);

  Route::delete('/{city_id}', [CityController::class, 'destroy']);
});

Route::prefix('airports')->group(function () {
  Route::get('/', [AirportController::class, 'index']);

  Route::get('/{airport}', [AirportController::class, 'show']);

  Route::post('/', [AirportController::class, 'store']);

  Route::put('/{airport}', [AirportController::class, 'update']);

  Route::patch('/{airport}', [AirportController::class, 'partialUpdate']);
  
  Route::delete('/{airport}', [AirportController::class, 'destroy']);
});

Route::prefix('planes')->group(function () {
  Route::get('/', [PlaneController  ::class, 'index']);

  Route::get('/{plane}', [PlaneController::class, 'show']);

  Route::post('/', [PlaneController::class, 'store']);

  Route::put('/{plane}', [PlaneController::class, 'update']);

  Route::patch('/{plane}', [PlaneController::class, 'partialUpdate']);
  
  Route::delete('/{plane}', [PlaneController::class, 'destroy']);
});

Route::prefix('flights')->group(function () {
  Route::get('/', [FlightController::class, 'index']);

  Route::get('/{flight}', [FlightController::class, 'show']);

  Route::post('/', [FlightController::class, 'store']);

  Route::put('/{flight}', [FlightController::class, 'update']);

  Route::patch('/{flight}', [FlightController::class, 'partialUpdate']);
  
  Route::delete('/{flight}', [FlightController::class, 'destroy']);
});

Route::prefix('payments')->group(function () {
  Route::get('/', [PaymentController::class, 'index']);

  Route::get('/{payment}', [PaymentController::class, 'show']);

  Route::post('/', [PaymentController::class, 'store']);

  Route::put('/{payment}', [PaymentController::class, 'update']);

  Route::patch('/{payment}', [PaymentController::class, 'partialUpdate']);
  
  Route::delete('/{payment}', [PaymentController::class, 'destroy']);
});

Route::prefix('bookings')->group(function () {
  Route::get('/', [BookingController::class, 'index']);

  Route::get('/{booking}', [BookingController::class, 'show']);

  Route::post('/', [BookingController::class, 'store']);
  
  Route::put('/{booking}', [BookingController::class, 'update']);
  
  Route::patch('/{booking}', [BookingController::class, 'partialUpdate']);
  
  Route::delete('/{booking}', [BookingController::class, 'destroy']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(
  function () {

    Route::post('/refresh-token', [AuthController::class, 'refreshToken'])
      ->middleware('ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value);

    Route::post('/logout', [AuthController::class, 'logOut']);
  }
);
