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
        // Por ahora redirigimos al catálogo o mostramos una vista simple
        return view('catalogo')->with('info', 'La funcionalidad de añadir animales estará disponible pronto.');
    }

    public function healthPanel()
    {
        $animales = Animal::all(); // En el futuro filtrar por problemas de salud
        return view('catalogo', compact('animales'))->with('info', 'Panel de Salud en desarrollo.');
    }
}
