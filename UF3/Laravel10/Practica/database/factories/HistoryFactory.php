<?php

namespace Database\Factories;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idmascota' => function () {
                return Pet::factory()->create()->id;
            },
            'fecha' => $this->faker->date(),
            'motivo_visita' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
        ];
    }
}
