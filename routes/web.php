<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test'])->name('test');

// Auth routes
// login register logout 

Route::get('/register', [AuthController::class, 'register_view'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.store.register');

Route::get('/login', [AuthController::class, 'login_view'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.store.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/forgot', [AuthController::class, 'forgot_view'])->name('auth.forgot');
Route::post('/forgot', [AuthController::class, 'forgot'])->name('auth.store.forgot');

Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/create/profile', [UserController::class, 'make_profile'])->middleware('auth')->name('profile.make');
Route::post('/create/profile', [UserController::class, 'store_profile'])->middleware('auth')->name('profile.store');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/create/course', [CourseController::class, 'create'])->name('courses.create');
Route::post('/create/courses', [CourseController::class, 'store'])->name('courses.store');

Route::get('files/{part}/{filename}', function (string $part, string $filename) {
    $path = $part . '/' . $filename;
    $full_path = Storage::path($path);

    return response()->download($full_path);
})->name('files.index');