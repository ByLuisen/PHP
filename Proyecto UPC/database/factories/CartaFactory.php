<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CartaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->word,
            'roll' => $this->faker->randomElement(['Luchador', 'Cuerpo a cuerpo', 'Tirador', 'Apoyo']),
            'coste_elixir' => $this->faker->numberBetween(1, 10),
        ];
    }
}
