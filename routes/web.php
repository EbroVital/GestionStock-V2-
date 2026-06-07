<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\mouvementController;
use App\Http\Controllers\productController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\resetMdpController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('welcome');

// route pour creer un compte
Route::prefix('register')->group(function () {
    Route::get('/', [registerController::class, 'create'])->name('register');
    Route::post('/', [registerController::class, 'store'])->name('register.store');
});

// route pour se connecter
Route::post('/login', [loginController::class, 'store'])->name('login');
// route pour se deconnecter
Route::post('/logout', [loginController::class, 'destroy'])->name('logout');

// Route pour les mots de passe oublié
Route::prefix('resetMdp')->group(function () {
    Route::get('/', [resetMdpController::class,'create'])->name('reset');
    Route::post('/', [resetMdpController::class, 'store'])->name('reset.store');
});

// route pour les categories
Route::resource('categories',categoryController::class);

// route pour le tableau de bord
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
});

// Route pour les produits et les mouvements
Route::resource('products', productController::class);
Route::resource('mouvements', mouvementController::class);

// Route pour la liste des employés
Route::get('/users', [userController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [userController::class, 'destroy'])->name('users.destroy');
