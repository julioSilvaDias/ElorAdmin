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
            "tel1"=>"godTel1",
            "tel2"=>"godTel2",
            "address"=>"godAddress",
            "dni"=>"000000G",
            "name"=>"godName",
            "email"=>"GodEmail@gmail.com",
            "password"=>bcrypt("admin"),
            "remember_token"=>Str::random(10),
            "created_at"=>now(),
            'role_id'=> 1,

        ]);

        DB::table('users')->insert([
            "user"=>"Snaider",
            "surname"=>"Luna",
            "tel1"=>"999",
            "tel2"=>"777",
            "address"=>"Elorrieta",
            "dni"=>"000000S",
            "name"=>"Jordy",
            "email"=>"Luna@gmail.com",
            "password"=>bcrypt("Snaider"),
            "remember_token"=>Str::random(10),
            "created_at"=>now(),
            'role_id' => 2,
        ]);

        User::factory()->count(20)->state([
            'role_id' => 3,
            "password"=>bcrypt("Elorrieta00"),

        ])->create();

        User::factory()->count(50)->state([
            'role_id' => 4,
            "password"=>bcrypt("Elorrieta00"),
        ])->create();
    }
}
