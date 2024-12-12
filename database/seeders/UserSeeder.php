<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "user"=>"God",
            "surname"=>"godSurname",
            "tel-1"=>"godTel1",
            "tel-2"=>"godTel2",
            "address"=>"godAddress",
            "dni"=>"000000G",
            "name"=>"godName",
            "email"=>"GodEmail@gmail.com",
            "password"=>"admin",
        ]);

        User::factory()->count(50)->create();
    }
}
