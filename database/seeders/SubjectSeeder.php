<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create([
            'name' => "Filosofía",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Religión",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Ciencias",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Matemáticas",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Literatura",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Geografía",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Historia",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Geología",
            'state'=> 1,
        ]);
        Subject::create([
            'name' => "Botánica",
            'state'=> 1,
        ]);
    }
}
