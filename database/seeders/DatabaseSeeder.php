<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Course::factory(8)->create();
    }
}