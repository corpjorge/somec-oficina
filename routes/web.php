<?php

use App\Http\Controllers\Admin\AdminDirectorioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\MunicipioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PQRController;
use App\Http\Controllers\PqrsOficinaController;
use App\Http\Controllers\ClasificadoController;
use App\Http\Controllers\ClasificadoTipoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventoListaController;
use App\Http\Controllers\ActualizacionController;
use App\Http\Controllers\Admin\AdminEventoController;
use App\Http\Controllers\Admin\AdminClasificadoController;
use App\Http\Controllers\Admin\AdminPqrController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/admin', [HomeController::class, 'redirecionar']);
Route::get('/home', [HomeController::class, 'ingreso']);

Route::get('/pqrs', [PQRController::class, 'vista']);
Route::post('/pqrs', [PQRController::class, 'crear']);
Route::post('/pqrs/correo', [PQRController::class, 'correo']);
Route::get('/pqrs-oficinas', [PqrsOficinaController::class, 'oficinas']);
Route::post('/pqrs-oficinas/crear', [PqrsOficinaController::class, 'crear']);

Route::get('/clasificados', [ClasificadoController::class, 'vista']);
Route::post('/clasificados', [ClasificadoController::class, 'crear']);
Route::get('/clasificados-tipo', [ClasificadoTipoController::class, 'tipos']);
Route::get('/clasificado', [ClasificadoController::class, 'vistaListaClasificados']);
Route::get('/clasificado/{tipo}', [ClasificadoController::class, 'ListaClasificados']);

Route::get('/eventos', [EventoController::class, 'vista']);
Route::post('/eventos', [EventoController::class, 'crear']);
Route::post('/eventos/correo', [EventoController::class, 'correo']);
Route::get('/eventos-lista', [EventoListaController::class, 'lista']);

Route::get('/departamentos-lista', [DepartamentoController::class, 'lista']);
Route::get('/ciudades-lista/{id}', [MunicipioController::class, 'lista']);

Route::get('/directorio/nuevo', [DirectorioController::class, 'vista']);
Route::get('/directorio', [DirectorioController::class, 'lista']);
Route::post('/directorio', [DirectorioController::class, 'crear']);
Route::get('/especialidades', [DirectorioController::class, 'listaEspecialidades']);
Route::get('/directorios/{especialidad}', [DirectorioController::class, 'listaDirectorios']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/actualizacion', [ActualizacionController::class, 'vista']);
    Route::post('/actualizacion', [ActualizacionController::class, 'guardarDatos']);
    Route::get('/datos', [ActualizacionController::class, 'datos']);

    Route::get('/admin/pqrs', [AdminPqrController::class, 'vista']);
    Route::get('/admin/pqrs/datos', [AdminPqrController::class, 'datos']);
    Route::get('/admin/pqrs/editar/{id}', [AdminPqrController::class, 'editar']);
    Route::post('/admin/pqrs/atender/{id}', [AdminPqrController::class, 'atender']);
    Route::post('/admin/pqrs/cerrar/{id}', [AdminPqrController::class, 'cerrar']);
    Route::post('/admin/pqrs/correo-cierre', [AdminPqrController::class, 'correoCierre']);

    Route::get('/admin/pqrs/oficinas', [PqrsOficinaController::class, 'todasOficinas']);
    Route::post('/admin/oficina/estado', [PqrsOficinaController::class, 'estado']);
    Route::put('/admin/oficina/update/{pqrsOficina}', [PqrsOficinaController::class, 'update']);

    Route::get('/admin/clasificados', [AdminClasificadoController::class, 'vista']);
    Route::get('/admin/clasificados/datos', [AdminClasificadoController::class, 'datos']);
    Route::post('/admin/clasificados/activar/{id}', [AdminClasificadoController::class, 'activar']);
    Route::delete('/admin/clasificados/eliminar/{id}', [AdminClasificadoController::class, 'eliminar']);

    Route::get('/admin/clasificados-tipo', [ClasificadoTipoController::class, 'todosTipos']);
    Route::post('/admin/clasificados/estado', [ClasificadoTipoController::class, 'estado']);
    Route::post('/admin/clasificados-tipo/create', [ClasificadoTipoController::class, 'crear']);

    Route::get('/admin/eventos', [AdminEventoController::class, 'vista']);
    Route::get('/admin/eventos/datos', [AdminEventoController::class, 'datos']);
    Route::put('/admin/eventos/update/{eventoLista}', [AdminEventoController::class, 'update']);
    Route::get('/admin/eventos/inscritos/{evento}', [AdminEventoController::class, 'inscritos']);
    Route::post('/admin/eventos/crear', [AdminEventoController::class, 'crear']);
    Route::delete('/admin/eventos/eliminar/{id}', [AdminEventoController::class, 'eliminar']);

    Route::get('/admin/directorio', [AdminDirectorioController::class, 'vista']);
    Route::get('/admin/directorios/datos', [AdminDirectorioController::class, 'datos']);
    Route::post('/admin/directorio/activar/{id}', [AdminDirectorioController::class, 'activar']);
    Route::delete('/admin/directorio/eliminar/{id}', [AdminDirectorioController::class, 'eliminar']);
    Route::get('/admin/especialidades', [AdminDirectorioController::class, 'todosEspecialidades']);
    Route::post('/admin/especialidad/create', [AdminDirectorioController::class, 'crear']);
    Route::put('/admin/especialidad/{especialidad}', [AdminDirectorioController::class, 'updateEspecialidad']);


});
