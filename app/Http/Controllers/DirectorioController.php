<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
