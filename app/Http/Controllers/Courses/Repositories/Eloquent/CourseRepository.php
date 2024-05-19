<?php

namespace App\Http\Controllers\Courses\Repositories\Eloquent;

use App\Http\Controllers\Courses\DTOs\Course as DTOsCourse;
use App\Http\Controllers\Courses\Interfaces\CourseRepositoryInterface;
use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{

    public function index(): array
    {
        $courses = [];
        $eloquentCoures = Course::profileNStudents()->get();

        foreach ($eloquentCoures as $course) {
            $courses[] = DTOsCourse::fromEloquent($course)->toArray();
        }

        return $courses;
    }

}