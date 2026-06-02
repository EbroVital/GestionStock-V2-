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

        return redirect()->route('dashboard');

    }

    public function destroy(Request $request) {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('welcome');

    }
}
