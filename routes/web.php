<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactTicketController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', function () {
    return view('contacto');
});
// Contacto
Route::post('/contacto', [ContactTicketController::class, 'store']);

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
    Route::get('/mis-solicitudes', [AdoptionRequestController::class, 'index'])->name('solicitudes.index');
    Route::post('/solicitud/update/{id}', [AdoptionRequestController::class, 'update'])->name('solicitudes.update');
    
    // Favoritos
    Route::post('/favoritos/toggle/{animal_id}', [App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favoritos.toggle');
    Route::get('/mis-favoritos', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favoritos.index');

    // Gestión de Animales (Admin/Voluntario)
    Route::get('/animales/gestion', [AnimalController::class, 'create'])->name('admin.animales.create');
    Route::post('/animales/gestion', [AnimalController::class, 'store'])->name('admin.animales.store');
    Route::get('/animal/{id}/edit', [AnimalController::class, 'edit'])->name('animal.edit');
    Route::put('/animal/{id}', [AnimalController::class, 'update'])->name('animal.update');
    Route::get('/panel-salud', [AnimalController::class, 'healthPanel'])->name('admin.health');
    Route::get('/solicitudes-pendientes', [AdoptionRequestController::class, 'adminIndex'])->name('admin.solicitudes');

    // Solicitudes de adopción (Admin/Voluntario)
    Route::get('/solicitudes-pendientes', [AdoptionRequestController::class, 'adminIndex'])->name('admin.solicitudes');
    Route::post('/solicitudes-pendientes/{id}/action', [AdoptionRequestController::class, 'adminAction'])->name('admin.solicitudes.action');
    //Tickets (Admin)
    Route::get('/tickets', [ContactTicketController::class, 'index'])->name('admin.tickets');
    // Perfil / Settings
    Route::get('/perfil', function () {
        return view('perfil');
    });
    Route::post('/perfil/update', [UserController::class, 'updateProfile'])->name('perfil.update');
    Route::post('/perfil/password', [UserController::class, 'updatePassword'])->name('perfil.password');
});
