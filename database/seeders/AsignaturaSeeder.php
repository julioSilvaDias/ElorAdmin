<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciclo;
use App\Models\Asignatura;
use Illuminate\Support\Facades\DB;


class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asignaturas')->insert([
            "nombre"=>"asignatura1",
            "descripcion"=>"descripcion1",
            "ciclo_id" => "1"
        ]);

        DB::table('asignaturas')->insert([
            "nombre"=>"asignatura2",
            "descripcion"=>"descripcion2",
            "ciclo_id" => "2"
        ]);

        DB::table('asignaturas')->insert([
            "nombre"=>"asignatura3",
            "descripcion"=>"descripcion3",
            "ciclo_id" => "3"
        ]);

    }
}
