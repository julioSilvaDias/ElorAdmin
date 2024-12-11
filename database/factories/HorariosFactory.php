<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Horario;
use App\Models\User; 
use App\Models\Asignatura;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HorariosFactory extends Factory
{
    protected $model = Horario::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->randomNumber(), 
            'dia-semana' => fake()->randomElement(['lunes', 'martes', 'miercoles', 'jueves', 'viernes']),
            'hora' => fake()->randomElement(['1', '2', '3', '4', '5', '6']),
            'profesor_id' => User::inRandomOrder()->first()->id,
            'asignatura_id' => Asignatura::inRandomOrder()->first()->id,
        ];
    }
}
