<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'first_lastname'      => 'Smith',
      'second_lastname'     => 'Johnson',
      'names'               => 'John Michael',
      'birth_date'          => '1990-01-01',
      'document_type_id'    => 1,
      'gender_id'           => 1,
      'document_number'     => '123456789',
      'child_condition'     => false,
      'cellphone_number'    => '1234567890',
      'email'               => 'john.smith@example.com',
      'password'            => Hash::make('password123'),
    ]);

    User::create([
      'first_lastname'      => 'Doe',
      'second_lastname'     => 'Wills',
      'names'               => 'Jane Elisabeth',
      'birth_date'          => '2024-05-17',
      'document_type_id'    => 2,
      'gender_id'           => 2,
      'document_number'     => '987654321',
      'child_condition'     => true,
      'cellphone_number'    => '0987654321',
      'email'               => 'jane.doe@example.com',
      'password'            => Hash::make('securepassword'),
    ]);
  }
}