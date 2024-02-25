<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nif' => $this->faker->unique()->regexify('[0-9]{8}[A-Za-z]{1}'),
            'nom' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'movil' => $this->faker->optional()->numerify('#########'),
        ];
    }
}
