<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'fisio_id' => fake()->numberBetween(1,3),
            'fecha' => fake()->date(),
            'hora' => fake()->time(),
            'paciente_id'=> random_int(1,10),
        ];
    }
}
