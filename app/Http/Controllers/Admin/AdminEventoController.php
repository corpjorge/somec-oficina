<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEventoController extends Controller
{
    public function vista()
    {
        return view('admin.eventos');
    }
}
