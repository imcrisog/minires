<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $users_count = User::count();

        return Inertia::render('Index', [
            'user' => auth()->user(),
            'users' => $users_count
        ]);
    }

    public function test()
    {
        return Inertia::render('Test');
    }
}
