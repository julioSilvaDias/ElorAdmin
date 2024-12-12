<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CicloUsuario;
use App\Models\Ciclo;
use App\Models\User;

class CicloUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CicloUsuario::factory()->count(10)->create();
    }
}
