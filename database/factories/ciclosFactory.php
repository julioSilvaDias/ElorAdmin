<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ciclo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ciclosFactory extends Factory
{
    protected $model = Ciclo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'curso' => fake()->numberBetween(1, 6),
            'nombre' => fake()->words(3, true),
            'descripcion' => fake()->paragraph(),
        ];
    }
}
