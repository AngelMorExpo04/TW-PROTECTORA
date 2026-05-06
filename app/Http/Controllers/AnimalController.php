<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return view('catalogo', compact('animales'));
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animal', compact('animal'));
    }
}
