<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Directorio;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class AdminDirectorioController extends Controller
{
    public function vista()
    {
        return view('admin.directorio');
    }

    public function datos()
    {
        if (auth()->user()->rol !== 1) { abort(403);  }
        return Directorio::orderBy('created_at', 'desc')->paginate(20);
    }

    public function crear(Request $request)
    {
         Especialidad::create([
            'nombre' => $request->nombre,
            'estado' => 1
        ]);
    }

    public function activar(Request $request, $id)
    {
        if (auth()->user()->rol !== 1) { abort(403);  }
        $clasificado = Directorio::find($id);
        $clasificado->estado = $request->estado ? null : 'true';
        $clasificado->save();
    }

    public function todosEspecialidades()
    {
        return Especialidad::all();
    }

    public function updateEspecialidad(Request $request, Especialidad $especialidad)
    {
        $especialidad->update($request->all());
    }

    public function eliminar($id)
    {
        if (auth()->user()->rol !== 1) { abort(403);  }
        Directorio::find($id)->delete();
    }

}
