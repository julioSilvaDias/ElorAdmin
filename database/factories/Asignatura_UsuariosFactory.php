<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asignatura_Usuario_Horario;
use App\Models\User;
use App\Models\Horario;
use App\Models\Asignatura;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Asignatura_UsuariosFactory extends Factory
{
    protected $model = AsignaturaUsuarioHorario::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => User::inRandomOrder()->first()->id,
            'horario_id' => Horario::inRandomOrder()->first()->id,
            'asignatura_id' => Asignatura::inRandomOrder()->first()->id,
        ];
    }
}
