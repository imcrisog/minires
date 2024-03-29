<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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