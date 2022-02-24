<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'profesion',
        'telefono',
        'especialidad',
        'estado'
    ];
}
