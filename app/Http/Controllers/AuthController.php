<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegiterUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function register_view()
    {
        $this->isLogged();

        return Inertia::render('Auth/Register');
    }

    public function register(RegiterUserRequest $request): RedirectResponse
    {
        $newUser = User::create($request->validated());

        auth()->login($newUser);

        return redirect()->route('profile');
    }

    public function login_view(): Response
    {
        $this->isLogged();

        return Inertia::render('Auth/Login');
    }

    public function login(LoginUserRequest $request): RedirectResponse 
    {
        $findUser = User::where('email', $request->validated('email'))->first();

        if (!$findUser) return back()->withErrors(['user' => 'No se encontro el Email']); 

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password]) == false) 
        {
            return back()->withErrors([
                'user' => 'Contraseña incorrecta'
            ]);
        }

        return redirect()->route('profile');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }

    /**
     * Nos aseguramos que si el usuario existe entonces redirija
     * @return ?RedirectResponse
     */
    private function isLogged(): void
    {
        if (auth()->check()) {
            redirect()->route('profile');
        }
    }
}
