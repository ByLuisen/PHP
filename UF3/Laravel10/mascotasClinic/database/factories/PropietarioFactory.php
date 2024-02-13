<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\es_ES\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $this->faker->addProvider(new Person($this->faker));

        return [
            'nif' => $this->faker->unique()->dni,
            'nom' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'movil' => $this->faker->phoneNumber,
        ];
    }
}
