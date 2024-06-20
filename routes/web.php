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

// Ruta principal
Route::resource('pelicula', PeliculaController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
