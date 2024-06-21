<?php

namespace App\Http\Controllers;

use App\Models\Videojuegos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideojuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los videojuegos paginados
        $videojuegos = Videojuegos::paginate(5);

        // Pasar los videojuegos a la vista
        return view('videojuego.index', compact('videojuegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Accedemos a la vista para crear un nuevo videojuego
        return view('videojuego.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los campos del formulario
        $camposValidacion = [
            'Title' => 'required|string|max:100',
            'Description' => 'required|string|min:50',
            'Ventas' => 'required|integer',
            'Photo' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'image' => 'El archivo cargado debe ser una imagen.',
            'mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg.',
        ];

        $this->validate($request, $camposValidacion, $mensajes);

        // Recolectamos los datos del formulario
        $datosJuego = $request->except('_token');

        // Procesamos la imagen si existe
        if ($request->hasFile('Photo')) {
            $datosJuego['Photo'] = $request->file('Photo')->store('uploads', 'public');
        }

        // Insertamos los datos en la base de datos
        Videojuegos::insert($datosJuego);

        // Redirigimos con un mensaje de éxito
        return redirect('videojuego')->with('mensaje', 'Videojuego agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuegos $videojuego)
    {
        // No implementado, podrías agregar lógica para mostrar un videojuego específico
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Buscamos el videojuego por su ID para editarlo
        $videojuego = Videojuegos::findOrFail($id);
        return view('videojuego.edit', compact('videojuego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validamos los campos del formulario
        $camposValidacion = [
            'Title' => 'required|string|max:100',
            'Description' => 'required|string|min:50',
            'Ventas' => 'required|integer',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        // Si existe el archivo de foto
        if ($request->hasFile('Photo')) {
            $camposValidacion = ['Photo' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje = ['Photo.required' => 'La foto es requerido'];
        }

        $this->validate($request, $camposValidacion, $mensaje);
        // Actualiza la información en la tabla de la base de datos
        $datosJuego = $request->except(['_token', '_method']);

        // Procesamos la nueva imagen si se ha cargado
        if ($request->hasFile('Photo')) {

            $videojuego = Videojuegos::findOrFail($id);
            // Eliminamos la imagen anterior si existe
            Storage::delete('public/' . $videojuego->Photo);

            // Almacenamos la nueva imagen
            $datosJuego['Photo'] = $request->file('Photo')->store('uploads', 'public');
        }

        Videojuegos::where('id', '=', $id)->update($datosJuego); // ¿Coincide con el id?

        // Actualizamos el registro en la base de datos
        $videojuego = Videojuegos::findOrFail($id);

        // Redirigimos con un mensaje de éxito
        return redirect('videojuego')->with('mensaje', 'Videojuego actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscamos el videojuego por su ID
        $videojuego = Videojuegos::findOrFail($id);

        // Si existe, vas a borrar la foto que tienes en public también
        if (Storage::delete('public/' . $videojuego->Photo)) {
            // Eliminar una tabla
            Videojuegos::destroy($id);
        }

        // Redirigimos con un mensaje de éxito
        return redirect('videojuego')->with('mensaje', 'Videojuego eliminado correctamente.');
    }
}
