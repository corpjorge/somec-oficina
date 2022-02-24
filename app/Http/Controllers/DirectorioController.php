<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Models\Directorio;

class DirectorioController extends Controller
{
    public function vista()
    {
        return view('directorio');
    }

    public function lista()
    {
        return view('listaDirectorio');
    }

    public function crear(Request $request)
    {
        Directorio::create($request->all());
    }

    public function listaDirectorios(Directorio $directorio, $especialidad)
    {
        return $directorio->where('estado', 'true')->where('especialidad', $especialidad)->get();
    }

    public function listaEspecialidades(Especialidad $especialidades)
    {
        return $especialidades->where('estado', 1)->get();
    }
}
