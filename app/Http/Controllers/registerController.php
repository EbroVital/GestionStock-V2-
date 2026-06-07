<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class registerController extends Controller
{
    public function create() {
        return view('register.create');
    }

     public function store(Request $request) {

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required','email', 'lowercase','max:255','unique:users'],
            'role' => ['required', 'in:admin,employe'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'=> $request->role,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('message', "Enregistrement éffectué, vous êtes connecté !");

    }


}
