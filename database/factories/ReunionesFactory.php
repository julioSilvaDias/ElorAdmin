<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reunion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReunionesFactory extends Factory
{
    protected $model = Reunion::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comentario' =>fake()->sentence(),
            'estado' => fake()->randomElement(['aceptado', 'rechazado', 'pendiente']),
            'fecha-hora-inicio' => fake()->dateTimeBetween('-1 year', 'now'), 
            'fecha-hora-fin' => fake()->dateTimeBetween('now', '+1 year'),
            'emisor_id' => fake()->optional()->numberBetween(1, 100),
            'receptor_id' => fake()->optional()->numberBetween(1, 100),
        ];
    }
}
