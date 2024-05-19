<?php

namespace App\Providers;

use App\Http\Controllers\Courses\Interfaces\CourseRepositoryInterface;
use App\Http\Controllers\Courses\Repositories\Eloquent\CourseRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 
    }
}
