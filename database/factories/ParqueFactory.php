<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parque>
 */
class ParqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'parque' => fake()->name(),
            'calle' => fake()->streetAddress(),
            'municipio' => fake()->city(),
            'codigo' => fake()->postcode()
        ];
    }
}
