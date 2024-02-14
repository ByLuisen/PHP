<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mascota;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LineaDeHistorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mascota_id' => Mascota::all()->random()->id,
            'fecha' => $this->faker->date,
            'motivo_visita' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
        ];
    }
}
