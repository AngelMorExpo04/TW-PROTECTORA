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
            'user_id' => Auth::id(),
            'animal_id' => $request->animal_id,
            'application_text' => $request->application_text,
            'status' => 'pending',
        ]);

        return redirect('/catalogo')->with('success', 'Pull Request (Solicitud de adopción) enviada con éxito.');
    }

    public function index()
    {
        $solicitudes = Auth::user()->adoptionRequests()->with('animal')->get();
        return view('mis-solicitudes', compact('solicitudes'));
    }

    public function update(Request $request, $id)
    {
        $solicitud = AdoptionRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'application_text' => 'required|string|min:50',
        ]);

        $solicitud->update([
            'application_text' => $request->application_text,
        ]);

        return back()->with('success', '¡Descripción del Pull Request actualizada!');
    }
}
