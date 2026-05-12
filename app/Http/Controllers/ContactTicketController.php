<?php

namespace App\Http\Controllers;

use App\Models\ContactTicket;
use Illuminate\Http\Request;

class ContactTicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'asunto' => 'required|string|max:255',
            'mensaje'=> 'required|string',
        ]);

        ContactTicket::create($request->only('nombre', 'email', 'asunto', 'mensaje'));

        return redirect('/contacto')->with('success', 'Ticket enviado con éxito.');
    }

    public function index()
    {
        $tickets = ContactTicket::orderBy('created_at', 'desc')->get();
        return view('admin.tickets', compact('tickets'));
    }
}
