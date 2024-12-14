<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            "remember_token"=>Str::random(10),
            "created_at"=>now(),
            'role_id'=> 1,
        ]);

        DB::table('users')->insert([
            "user"=>"Snaider",
            "surname"=>"Luna",
            "tel-1"=>"999",
            "tel-2"=>"777",
            "address"=>"Elorrieta",
            "dni"=>"000000S",
            "name"=>"Jordy",
            "email"=>"Luna@gmail.com",
            "password"=>"Snaider",
            "remember_token"=>Str::random(10),
            "created_at"=>now(),
            'role_id' => 2,
        ]);

        User::factory()->count(3)->state([
            'role_id' => 3,
        ])->create();

        User::factory()->count(10)->state([
            'role_id' => 4,
        ])->create();
    }
}
