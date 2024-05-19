<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()
        ->for(
            Profile::factory()->forUser()
        )
        ->hasAttached(
            Profile::factory()->forUser()->count(2),
            ['progress' => 0, 'lastVideo' => 'a'],
        )
        ->count(2)
        ->create();
    }
}
