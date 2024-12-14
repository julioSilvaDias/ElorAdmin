<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AsignaturaUsuarioHorario;
use App\Models\User;
use App\Models\Horario;
use App\Models\Asignatura;

class AsignaturaUsuarioHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AsignaturaUsuarioHorario::factory()->count(10)->create();
    }
}
