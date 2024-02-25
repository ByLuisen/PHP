<?php

namespace Database\Factories;

use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propietario>
 */
class PropietarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nif' => $this->faker->unique()->regexify('[0-9]{8}[A-Z]{1}'),
            'nom' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'movil' => $this->faker->phoneNumber,
        ];
    }
}
