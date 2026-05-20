<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $tipo = $request->query('tipo');
        
        if ($tipo == 'perros') {
            $animales = Animal::where('species', 'Perro')->get();
        } elseif ($tipo == 'gatos') {
            $animales = Animal::where('species', 'Gato')->get();
        } else {
            $animales = Animal::all();
        }
        
        return view('catalogo', compact('animales'));
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animal', compact('animal'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'voluntario') {
            return redirect('/catalogo')->withErrors(['error' => 'No tienes permiso para crear repositorios.']);
        }
        return view('animal-create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'voluntario') {
            return redirect('/catalogo')->withErrors(['error' => 'No tienes permiso para crear repositorios.']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
            'sex' => 'required|in:male,female',
            'health_status' => 'required|string',
            'description' => 'required|string',
            'image_path' => 'required|url',
        ]);
        
        $validated['status'] = 'available';

        $animal = Animal::create($validated);

        return redirect('/animal/' . $animal->id)->with('success', 'Repositorio (Animal) creado correctamente.');
    }

    public function healthPanel()
    {
        $animales = Animal::all();
        return view('catalogo', compact('animales'))->with('info', 'Panel de Salud en desarrollo.');
    }

    public function edit($id)
    {
        // Solo voluntarios pueden editar
        if (auth()->user()->role !== 'voluntario') {
            return redirect('/catalogo')->withErrors(['error' => 'No tienes permiso para editar repositorios.']);
        }

        $animal = Animal::findOrFail($id);
        return view('animal-edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        // Solo voluntarios pueden editar
        if (auth()->user()->role !== 'voluntario') {
            return redirect('/catalogo')->withErrors(['error' => 'No tienes permiso para editar repositorios.']);
        }

        $animal = Animal::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
            'sex' => 'required|in:male,female',
            'health_status' => 'required|string',
            'description' => 'required|string',
            'image_path' => 'required|url',
        ]);

        $animal->update($validated);

        return redirect('/animal/' . $animal->id)->with('success', 'Repositorio (Animal) actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Solo voluntarios pueden borrar
        if (auth()->user()->role !== 'voluntario') {
            return redirect('/catalogo')->withErrors(['error' => 'No tienes permiso para borrar repositorios.']);
        }

        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect('/catalogo')->with('success', 'Repositorio (Animal) borrado permanentemente.');
    }
}
