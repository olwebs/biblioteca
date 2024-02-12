<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
            $this->call([
                //AuthorSeeder::class,
                //EditorialSeeder::class,
                //SubjectSeeder::class,
                //BookSeeder::class,
                //RoleSeeder::class,
            ]);
    }
}
