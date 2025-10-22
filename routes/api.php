<?php

use App\Enums\TokenAbility;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\DocumentType\DocumentTypeController;
use App\Http\Controllers\API\Gender\GenderController;
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


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(
  function () {

    Route::post('/refresh-token', [AuthController::class, 'refreshToken'])
      ->middleware('ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value);

    Route::post('/logout', [AuthController::class, 'logOut']);
  }
);
