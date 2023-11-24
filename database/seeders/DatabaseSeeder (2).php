<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsDemoSeeder::class);
        \App\Models\User::factory(3)->create();
    \App\Models\Fisio::factory(3)->create();

        \App\Models\Paciente::factory(10)->create();
         \App\Models\Cita::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Jesus',
             'email' => 'jesus@jesus.es',
         ]);
    }
}
