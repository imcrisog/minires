<?php

namespace App\Http\Controllers\Courses;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('profile')->with('profiles')->get();

        return Inertia::render('Courses/Index', [
            'courses' => $courses
        ]);
    }
}