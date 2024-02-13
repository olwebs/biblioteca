<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create([
            'name' => "Ana Admin",
            'email' => "admin@hotmail.com",
            'password' => Hash::make("12345678"),
            'date_admission' => "2024-01-01",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Rosa Biblio",
            'email' => "biblio@hotmail.com",
            'password' => Hash::make("12345678"),
            'date_admission' => "2024-01-01",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Eva Reader",
            'email' => "reader@hotmail.com",
            'password' => Hash::make("12345678"),
            'date_admission' => "2024-01-01",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Florencia",
            'email' => "florencia@hotmail.com",
            'password' => Hash::make("12345678"),
            'date_admission' => "2024-01-01",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Luisa",
            'email' => "luisa@hotmail.com",
            'password' => Hash::make("12345678"),
            'date_admission' => "2024-01-01",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Emilia Reader",
            'email' => "emilia@hotmail.com",
            'password' => Hash::make("12345678"),
            'date_admission' => "2024-01-01",
            'state'=> 1,
        ]);

    }
}
