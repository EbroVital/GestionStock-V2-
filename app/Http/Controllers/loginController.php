<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function store(loginRequest $request) {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('message', "Vous êtes connectez avec succès");

    }

    // public function store(Request $request)
    // {
    //     // 1. Validation
    //     $request->validate([
    //         'email'    => ['required', 'email', 'string'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     // 2. Tentative de connexion
    //     if (!Auth::attempt($request->only('email', 'password'))) {
    //         return back()->withErrors([
    //             'email' => 'Email ou mot de passe incorrect.',
    //         ])->withInput($request->only('email'));
    //     }

    //     // 3. Régénération de session (sécurité)
    //     $request->session()->regenerate();

    //     // 4. Redirection
    //     return redirect()->route('dashboard')
    //                     ->with('success', 'Vous êtes connecté avec succès !');
    // }

    public function destroy(Request $request) {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('welcome');

    }
}
