<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asignatura_Usuario_Horario;
use App\Models\User;
use App\Models\Horario;
use App\Models\Asignatura;

class Asignatura_Usuario_HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asignatura_Usuario_Horario::factory()->count(10)->create();
    }
}
