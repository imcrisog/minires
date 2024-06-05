<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Courses\Interfaces\CourseRepositoryInterface;
use App\Http\Requests\StoreCourseRequest;
use Inertia\Response;

class CourseController extends Controller
{
    public function __construct(
        private CourseRepositoryInterface $repository
    ) {}

    public function index(): Response
    {
        $courses = $this->repository->index();

        return Inertia::render('Courses/Index', [
            'courses' => $courses
        ]);
    }

    public function show(Course $course) 
    {

    }

    public function store(StoreCourseRequest $request, int $courseId) 
    {
        $course =  $this->repository->create($request);

        return dd($course);
    }
}