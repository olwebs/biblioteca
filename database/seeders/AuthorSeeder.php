<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        /*
        Author::create([
            'name' => "Rosa Mª Mateo Segura",
            'state'=> 1,
        ]);
        */
        Author::factory()->count(50)->create();
    }
}
