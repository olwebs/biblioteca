<?php

namespace Database\Factories;

use App\Models\Editorial;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'sinopsis' => fake()->paragraph(),
            'state' => random_int(0,1),
            'observations' => fake()->paragraph(),
            'photo' => "icon-libro.png",
            //'editorial_id' => Editorial::factory(),
            'editorial_id' => random_int(1,10),
            'subject_id' => random_int(1,10),
        ];
    }
}
