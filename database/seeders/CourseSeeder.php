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
        $profile = Profile::factory()->create();
        $students = Profile::factory()->count(3)->create();
        $course = Course::factory()->create()->profile()->associate($profile);
        $course->profiles()->attach($students, ['progress' => 0, 'lastVideo' => 'asd']);
        $course->save();
    }
}
