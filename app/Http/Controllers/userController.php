<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function destroy(User $user) {

        $user->delete();

        return redirect()->route('users.index')->with('message', 'Employé supprimé avec succès !');

    }
}
