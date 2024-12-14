<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reunion;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReunionFactory extends Factory
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
            'emisor_id' => User::inRandomOrder()->first()->id, // Asigna un emisor existente aleatorio
            'receptor_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
