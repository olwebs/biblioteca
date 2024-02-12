<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EditorialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name('company'),
            'state' => random_int(0,1),
        ];
    }
}
