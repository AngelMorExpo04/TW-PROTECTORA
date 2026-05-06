<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionRequestController extends Controller
{
    public function create($animal_id)
    {
        $animal = Animal::findOrFail($animal_id);
        return view('adopcion', compact('animal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'application_text' => 'required|string|min:50',
        ]);

        AdoptionRequest::create([
            'user_id' => Auth::id(), // Puede ser null si el usuario no ha iniciado sesión, asegúrate de añadir middleware 'auth' si es obligatorio
            'animal_id' => $request->animal_id,
            'application_text' => $request->application_text,
            'status' => 'pending',
        ]);

        // Redirigimos de vuelta al catálogo con un mensaje de éxito (que luego podremos mostrar en la vista)
        return redirect('/catalogo')->with('success', 'Pull Request (Solicitud de adopción) enviada con éxito.');
    }
}
