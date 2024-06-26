<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostramos los datos (los 5 primeros registros)
        $datos["peliculas"] = Pelicula::paginate(5);
        return view('pelicula.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Accedemos a la vista create
        return view('pelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos cada campo de registro
        $camposValidacion = [
            'Title' => 'required|string|max:100',
            'Description' => 'required|string|min:50',
            'Release_date' => 'required',
            'Runtime' => 'required|integer|min:1',
            'Director' => 'required|string|max:100',
            'Photo' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Photo.required' => 'La foto es requerido'
        ];

        $this->validate($request, $camposValidacion, $mensaje);

        // Recolecta toda la información del formulario pelicula
        $datosPelicula = request()->except('_token');

        // Si existe el archivo de foto
        if ($request->hasFile('Photo')) {
            // Alteramos el campo y lo insertamos en public uploads
            $datosPelicula['Photo'] = $request->file('Photo')->store('uploads', 'public');
        }

        // Insertalo a la base de datos excepto el token
        Pelicula::insert($datosPelicula);

        //return response()->json($datosPelicula);
        return redirect('pelicula')->with('mensaje', 'Pelicula agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Modificar o editar
        //Recuperamos los datos puestos y buscamos un registro que coincida con el id
        $pelicula = Pelicula::findOrFail($id);
        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validamos cada campo de registro
        $camposValidacion = [
            'Title' => 'required|string|max:100',
            'Description' => 'required|string|min:50',
            'Release_date' => 'required',
            'Runtime' => 'required|integer|min:1',
            'Director' => 'required|string|max:100',
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
        $datosPelicula = $request->except(['_token', '_method']);

        // Si existe el archivo de foto, sale la validación
        if ($request->hasFile('Photo')) {
            // Recuperamos la información
            $pelicula = Pelicula::findOrFail($id);

            // Haz el borrado antiguo foto
            Storage::delete('public/' . $pelicula->Photo);

            // Alteramos el campo y lo insertamos en public uploads
            $datosPelicula['Photo'] = $request->file('Photo')->store('uploads', 'public');
        }

        Pelicula::where('id', '=', $id)->update($datosPelicula); // ¿Coincide con el id?
        $pelicula = Pelicula::findOrFail($id);
        // return view('pelicula.edit', compact('pelicula'));
        return redirect('pelicula')->with('mensaje', 'Pelicula editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la foto de storage, busco la información a partir del id
        $pelicula = Pelicula::findOrFail($id);

        // Si existe, vas a borrar la foto que tienes en public también
        if (Storage::delete('public/' . $pelicula->Photo)) {
            // Eliminar una tabla
            Pelicula::destroy($id);
        }

        // Después del borrado redirigue nuevamente
        return redirect('pelicula')->with('mensaje', 'Pelicula eliminado con éxito');;
    }
}
