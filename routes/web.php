<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\DownloaderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Auth and users routes

Route::get('/register', [AuthController::class, 'register_view'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.store.register');

Route::get('/login', [AuthController::class, 'login_view'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.store.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/forgot', [AuthController::class, 'forgot_view'])->name('auth.forgot');
Route::post('/forgot', [AuthController::class, 'forgot'])->name('auth.store.forgot');

// Profile routes

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/create/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile.make');
Route::post('/create/profile', [ProfileController::class, 'store'])->middleware('auth')->name('profile.store');

// Courses routes

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/create/course', [CourseController::class, 'create'])->name('courses.create');
Route::post('/create/courses', [CourseController::class, 'store'])->name('courses.store');

// Download routes

Route::get('files/{part}/{filename}', DownloaderController::class)->name('files.index');