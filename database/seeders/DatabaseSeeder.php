<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    User::factory()->create([
      'name' => 'John',
      'email' => 'johngna@gmail.com',
      'password' => bcrypt('jgnapc02'),
    ]);

    $this->call([
      ReportTypesSeeder::class,
      CustomFieldsSeeder::class,
    ]);

  }
}
