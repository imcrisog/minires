<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function make_profile()
    {
        $user = auth()->user();
        $profile = $user->profile;

        if (isset($profile)) {
            return redirect()->route('profile');
        }

        return Inertia::render("Profile/Form");
    }

    public function store_profile(Request $request) 
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