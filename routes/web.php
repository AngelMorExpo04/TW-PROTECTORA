<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', function () {
    return view('contacto');
});

// Rutas de Autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Ruta de login ficticia para que el middleware 'auth' sepa a dónde redirigir en caso de error
Route::get('/login', function () {
    return redirect('/')->withErrors(['login' => 'Debes iniciar sesión para acceder a esta página.']);
})->name('login');

// Rutas públicas de animales
Route::get('/catalogo', [AnimalController::class, 'index']);
Route::get('/animal/{id}', [AnimalController::class, 'show']);

// Rutas protegidas (Requieren inicio de sesión)
Route::middleware('auth')->group(function () {
    Route::get('/adopcion/{animal_id}', [AdoptionRequestController::class, 'create']);
    Route::post('/adopcion', [AdoptionRequestController::class, 'store']);
    
    // Favoritos
    Route::post('/favoritos/toggle/{animal_id}', [App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favoritos.toggle');
    Route::get('/mis-favoritos', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favoritos.index');

    // Perfil / Settings
    Route::get('/perfil', function () {
        return view('perfil');
    });
    Route::post('/perfil/update', [UserController::class, 'updateProfile'])->name('perfil.update');
    Route::post('/perfil/password', [UserController::class, 'updatePassword'])->name('perfil.password');
});
