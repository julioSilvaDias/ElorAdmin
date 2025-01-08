<?php

namespace Database\Factories;

use App\Models\CicloUsuario;
use App\Models\Ciclo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CicloUsuarioFactory extends Factory
{
    protected $model = CicloUsuario::class;

    public function definition(): array
    {
        return [
            'id' => fake()->unique()->randomNumber(),
            'fecha_matricula' => fake()->dateTimeThisYear(),
            'ciclo_id' => Ciclo::inRandomOrder()->first()->id,
            'usuario_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
