<?php

namespace App\Http\Controllers;

use App\Mail\InscritoEvento;
use App\Models\EventoLista;
use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Mail;

class EventoController extends Controller
{
    public function vista()
    {
        return view('eventos');
    }

    public function crear(Request $request, Evento $evento)
    {

        $request->validate([
            'nombre' => 'required',
            'cedula' => 'required|numeric|min:0',
            'celular' => 'required|numeric|min:0',
            'correo' => 'required|email',
            'evento' => 'required',
        ]);

        $evento->create($request->all());
    }

    public function correo(Request $request)
    {
        $evento = EventoLista::where('nombre', $request->evento)->first();
        Mail::to($evento->correo)->send(new InscritoEvento());
    }

}
