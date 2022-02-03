<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClasificadoTipo;

class ClasificadoTipoController extends Controller
{
    public function tipos(ClasificadoTipo $clasificadoTipo)
    {
        return $clasificadoTipo->where('estado', 1)->get();
    }

    public function todosTipos(ClasificadoTipo $clasificadoTipo)
    {
        return $clasificadoTipo->all();
    }

    public function estado(Request $request)
    {
        $tipo = ClasificadoTipo::find($request->id);
        $tipo->estado = $request->estado;
        $tipo->save();
    }

    public function crear(Request $request)
    {
        $oficina = new ClasificadoTipo();
        $oficina->nombre = $request->nombre;
        $oficina->estado = 1;
        $oficina->save();
    }

}
