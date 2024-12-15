<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciclo;
use Illuminate\Support\Facades\DB;


class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ciclos')->insert([
            [
                'curso' => 2,
                'nombre' => 'curso1',
                'descripcion' => 'descripcion1',
                "created_at"=>now()
            ],
        ]);

        DB::table('ciclos')->insert([
            [
                'curso' => 4,
                'nombre' => 'curso2',
                'descripcion' => 'descripcion2',
                "created_at"=>now()
            ],
        ]);

        DB::table('ciclos')->insert([
            [
                'curso' => 1,
                'nombre' => 'curso3',
                'descripcion' => 'descripcion3',
                "created_at"=>now()
            ],
        ]);
}}
