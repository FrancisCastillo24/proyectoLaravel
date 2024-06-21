<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', function () {
    return view('auth.login');
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

// Te lleva a home
Route::get('/home', [PeliculaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [PeliculaController::class, 'index'])->name('home');
});