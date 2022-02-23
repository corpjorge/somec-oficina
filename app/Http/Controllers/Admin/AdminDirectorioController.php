<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDirectorioController extends Controller
{
    public function vista()
    {
        return view('admin.directorio');
    }
}
