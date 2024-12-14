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
            'fecha-matricula' => fake()->dateTimeThisYear(),
            'ciclo-id' => Ciclo::inRandomOrder()->first()->id,
            'usuario-id' => User::inRandomOrder()->first()->id,
        ];
    }
}
