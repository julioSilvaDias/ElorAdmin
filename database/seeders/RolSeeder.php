<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rols')->insert([
            "name"=>"God",
            "created_at"=>now(),
        ]);
        DB::table('rols')->insert([
            "name"=>"administrador",
            "created_at"=>now(),
        ]);
        DB::table('rols')->insert([
            "name"=>"Profesor",
            "created_at"=>now(),
        ]);
        DB::table('rols')->insert([
            "name"=>"Alumno",
            "created_at"=>now(),
        ]);
        
    }
}
