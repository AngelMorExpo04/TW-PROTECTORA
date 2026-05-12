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

    /**
     * Admin/Voluntario: Ver todas las solicitudes pendientes.
     */
    public function adminIndex()
    {
        // Solo admin o voluntario
        if (!in_array(Auth::user()->role, ['admin', 'voluntario'])) {
            abort(403);
        }

        $solicitudes = AdoptionRequest::where('status', 'pending')
            ->with(['animal', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mis-solicitudes', compact('solicitudes'));
    }

    /**
     * Admin/Voluntario: Aprobar o rechazar una solicitud.
     */
    public function adminAction(Request $request, $id)
    {
        // Solo admin o voluntario
        if (!in_array(Auth::user()->role, ['admin', 'voluntario'])) {
            abort(403);
        }

        $solicitud = AdoptionRequest::findOrFail($id);
        $action = $request->input('action');

        if ($action === 'approve') {
            // Aprobar: eliminar el animal de la base de datos (cascade borra todas sus solicitudes)
            if ($solicitud->animal) {
                $animalName = $solicitud->animal->name;
                $solicitud->animal->delete();
                return redirect('/solicitudes-pendientes')->with('success', "Solicitud aprobada. El animal «{$animalName}» ha sido eliminado del catálogo.");
            }
            return redirect('/solicitudes-pendientes')->with('error', 'El animal ya no existe.');

        } elseif ($action === 'reject') {
            // Rechazar: borrar solo la solicitud, el animal sigue disponible
            $solicitud->delete();
            return redirect('/solicitudes-pendientes')->with('success', 'Solicitud rechazada y eliminada.');
        }

        return redirect('/solicitudes-pendientes')->with('error', 'Acción no válida.');
    }
}
