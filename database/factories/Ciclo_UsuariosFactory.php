<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CicloUsuario;
use App\Models\Ciclo;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Ciclo_UsuariosFactory extends Factory
{
    protected $model = CicloUsuario::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'fecha-matricula' => $this->faker->dateTimeThisYear(),
            'ciclo-id' => Ciclo::inRandomOrder()->first()->id,
            'usuario-id' => User::inRandomOrder()->first()->id,
        ];
    }
}
