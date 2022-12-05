<?php

namespace Database\Factories;

use App\Models\Enterprise;
use App\Models\Parque;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subestacion>
 */
class SubestacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ids = Parque::all()->pluck('id')->toArray();
        $ids_enterprise = Enterprise::all()->pluck('id')->toArray();
        $ids_type = Type::all()->pluck('id')->toArray();
        return [
            'subestacion' => fake()->name(),
            'type_id' => fake()->randomElement($ids_type),
            'parque_id' => fake()->randomElement($ids),
            'status_id' => 2,
            'enterprise_id' => fake()->randomElement($ids_enterprise),
        ];
    }
}
