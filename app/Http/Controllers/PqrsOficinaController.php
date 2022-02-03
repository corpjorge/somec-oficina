<?php

namespace App\Http\Controllers;

use App\Models\PqrsOficina;
use Illuminate\Http\Request;

class PqrsOficinaController extends Controller
{
    public function oficinas(PqrsOficina $pqrsOficina)
    {
        return $pqrsOficina->where('estado', 1)->get();
    }

    public function todasOficinas(PqrsOficina $pqrsOficina)
    {
        return $pqrsOficina->all();
    }

    public function crear(Request $request)
    {
        $oficina = new PqrsOficina();
        $oficina->nombre = $request->nombre;
        $oficina->correo = $request->correo;
        $oficina->estado = 1;
        $oficina->save();
    }

    public function estado(Request $request)
    {
        $oficina = PqrsOficina::find($request->id);
        $oficina->estado = $request->estado;
        $oficina->save();
    }
}
