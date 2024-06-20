<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', function () {
    return view('welcome');
});

/* Accedemos a la carpeta empleado de la vista
Route::get('/pelicula', function () {
    // Con el punto accedemos a cualquier fichero php de dentro
    return view('pelicula.index');
});

Route::get('pelicula/create', [PeliculaController::class, 'create']);
*/

Route::resource('pelicula', PeliculaController::class);