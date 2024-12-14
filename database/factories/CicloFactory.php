<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ciclo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciclo>
 */
class CicloFactory extends Factory
{
    // Define el modelo asociado a esta fábrica
    protected $model = Ciclo::class;

    /**
     * Define el estado predeterminado de la fábrica.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'curso' => fake()->numberBetween(1, 6),
            'nombre' => fake()->words(3, true),
            'descripcion' => fake()->sentence(15),
        ];
    }
}
