<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function register_view()
    {
        if (auth()->check()) {
            return redirect()->route('profile');
        }

        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:6'
        ]);

        $newUser = new User();
        $newUser->name = $request->username;
        $newUser->email = $request->email;
        $newUser->password = $request->password;

        $newUser->save();

        auth()->login($newUser);

        return redirect()->route('profile');
    }

    public function login_view()
    {
        if (auth()->check()) {
            return redirect()->route('profile');
        }

        return Inertia::render('Auth/Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $findUser = User::where('email', $request->email)->first();

        if (!$findUser) return back()->withErrors(['user' => 'No se encontro el Email']); 

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password]) == false) 
        {
            return back()->withErrors([
                'user' => 'Contraseña incorrecta'
            ]);
        }

        return redirect()->route('profile');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }

    public function profile()
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
}
