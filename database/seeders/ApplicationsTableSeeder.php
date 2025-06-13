<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::create([
            'name' => 'test1',
            'phone' => '79123123123',
            'email' => 'example@example.com',
            'message' => 'test1',
            'is_processed' => 1,
            'created_at' => '2025-05-29 10:16:11',
            'updated_at' => '2025-05-29 10:19:54'
        ]);
    }
}
