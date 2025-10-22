<?php

namespace Database\Seeders\DocumentType;

use App\Models\DocumentType\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DocumentType::create(['name' => 'Cédula de Ciudadanía']);
    DocumentType::create(['name' => 'Tarjeta de identidad']);
    DocumentType::create(['name' => 'Pasaporte']);
  }
}
