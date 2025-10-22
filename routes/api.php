<?php

use App\Http\Controllers\API\Gender\GenderController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return User::all();
});

Route::prefix('genders')->group(function () {
  Route::get('/', [GenderController::class, 'index']);

  Route::get('/{gender_id}', [GenderController::class, 'show']);

  Route::post('/', [GenderController::class, 'store']);

  Route::put('/{gender_id}', [GenderController::class, 'update']);

  Route::patch('/{gender_id}', [GenderController::class, 'partialUpdate']);

  Route::delete('/{gender_id}', [GenderController::class, 'destroy']);
  
});
