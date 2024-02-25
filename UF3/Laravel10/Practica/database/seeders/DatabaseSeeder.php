<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Owner::factory(10)->create();
        \App\Models\Pet::factory(10)->create();
        \App\Models\History::factory(10)->create();
    }
}
