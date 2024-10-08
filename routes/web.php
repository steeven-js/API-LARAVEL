<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

// Utilisateur non connecté
Route::get('/', function () {
    return view('welcome');
});

// Utilisateur connecté
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Utilisateur connecté
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Je crée une route pour afficher la page de contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});

require __DIR__.'/auth.php';
