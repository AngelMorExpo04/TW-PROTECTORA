<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request, $animalId)
    {
        if (!Auth::check()) {
            return back()->withErrors(['login' => 'Debes iniciar sesión para marcar favoritos.']);
        }

        $user = Auth::user();
        $animal = Animal::findOrFail($animalId);

        // Toggle the favorite
        $user->favorites()->toggle($animal->id);

        return back()->with('success', 'Lista de favoritos actualizada.');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/')->withErrors(['login' => 'Inicia sesión para ver tus favoritos.']);
        }

        $animales = Auth::user()->favorites;
        return view('favoritos', compact('animales'));
    }
}
