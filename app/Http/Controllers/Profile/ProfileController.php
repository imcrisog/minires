<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile;

        if (!isset($profile)) {
            return redirect()->route('profile.make');
        }

        return Inertia::render('Auth/Profile', [
            'user' => $user,
            'profile' => $profile
        ]);
    }

    public function show()
    {
        $profile = auth()->user()->profile;

        if (isset($profile)) {
            return redirect()->route('profile');
        }

        return Inertia::render("Profile/Form");
    }

    public function store(Request $request) 
    {
        $user = User::find(auth()->user()->id);
        $profile = $user->profile;

        if (isset($profile)) {
            return redirect()->route('profile');
        }

        $icon_path = $request->file('icon')->store('icons');
        $banner_path = $request->file('banner')->store('banners');

        $newProfile = $user->profile()->create([
            'name' => $user->name,
            'icon' => $icon_path,
            'banner' => $banner_path,
            'bio' => $request->bio,
            'type' => 0,
            'premium' => 0
        ]);

        return dd($newProfile);

    }
}
