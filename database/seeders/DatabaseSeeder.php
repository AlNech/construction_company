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
        $this->call([
            ServicesTableSeeder::class,
            UsersTableSeeder::class,
            NewsTableSeeder::class,
            PortfoliosTableSeeder::class,
            ApplicationsTableSeeder::class,
        ]);
    }
}
