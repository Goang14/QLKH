<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            IndirectTasksSeeder::class,
            PlaceWorksSeeder::class,
            WorkContentsSeeder::class,
            PositionsSeeder::class,
            ProjectSeeder::class,
            UpdateNameViInIndirectTasksSeeder::class
        ]);
    }
}
