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
Route::resource('pelicula', PeliculaController::class)->middleware('auth'); // cuando pongo el middleware, le estoy diciendo que respete la autenticación, de lo contrario si no estás autenticado no puedes acceder a nada
Auth::routes(['register'=>false, 'reset'=>false]); // Le digo que no quiero el registro ni el resetear, no lo voy a utilizar

// Cuando te registras y estas registrado, si regresas te redirigue a home
Route::get('/home', [PeliculaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [PeliculaController::class, 'index'])->name('home');
});

// Autenticación