<?php

namespace App\Http\Controllers\Courses\Interfaces;

use App\Http\Controllers\Courses\DTOs\Course;
use Illuminate\Http\Request;

interface CourseRepositoryInterface
{
    public function index(): array;
    public function create(Request $request): Course;
}