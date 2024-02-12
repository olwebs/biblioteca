<?php

namespace Database\Seeders;

use App\Models\Editorial;
use Illuminate\Database\Seeder;

class EditorialSeeder extends Seeder
{
    public function run(): void
    {
        Editorial::factory()->count(13)->create();
    }
}
