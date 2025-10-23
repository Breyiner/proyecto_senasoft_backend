<?php

namespace App\Services\User;

use App\Models\User\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService
{
  public static function getAll()
  {
    $users = User::all();

    if (count($users) == 0) {
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay usuarios registrados",
        "data" => $users,
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Usuarios obtenidos con éxito",
      "data" => $users,
    ];
  }

  public function getById($id)
  {
    $user = User::find($id);

    if (!$user) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Usuario no encontrado",
      ];
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Usuario obtenido con éxito",
      "data" => $user,
    ];
  }

  public function create(array $data)
  {
    $data['password'] = Hash::make($data['password']);

    $user = User::create($data);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Usuario creado con éxito',
      'data' => $user,
    ];
  }

  public function update(array $data, $id)
  {
    $user = User::find($id);

    if (!$user) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Usuario no encontrado",
      ];
    }

    if (isset($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    } else {
      unset($data['password']);
    }

    $user->update(Arr::except($data, ['password']));
    if (isset($data['password'])) {
      $user->password = $data['password'];
      $user->save();
    }

    return [
      "error" => false,
      "code" => 200,
      "message" => "Usuario actualizado con éxito",
    ];
  }

  public function partialUpdate(array $data, $id)
  {
    $user = User::find($id);

    if (!$user) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Usuario no encontrado",
      ];
    }

    if (isset($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    }

    $user->update($data);

    return [
      "error" => false,
      "code" => 200,
      "message" => "Usuario actualizado parcialmente con éxito",
    ];
  }

  public function delete($id)
  {
    $user = User::find($id);

    if (!$user) {
      return [
        "error" => true,
        "code" => 404,
        "message" => "Usuario no encontrado",
      ];
    }

    $user->delete();

    return [
      "error" => false,
      "code" => 200,
      "message" => "Usuario eliminado con éxito",
    ];
  }
}
