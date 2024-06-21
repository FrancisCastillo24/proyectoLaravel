@extends('layouts.app')

@section('content')
<div class="container my-5" style="background-color: #f8f9fa; border-radius: 10px; padding: 20px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Listado de Películas</h2>
        <a href="{{ url('pelicula/create') }}" class="btn btn-primary">Registrar Película</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Código</th>
                    <th>Portada</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Estreno</th>
                    <th>Duración</th>
                    <th>Director</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->id }}</td>
                    <td>
                        <img src="{{ asset('storage').'/'.$pelicula->Photo }}" width="100" alt="{{ $pelicula->Title }}">
                    </td>
                    <td>{{ $pelicula->Title }}</td>
                    <td>{{ $pelicula->Description }}</td>
                    <td>{{ $pelicula->Release_date }}</td>
                    <td>{{ $pelicula->Runtime }}</td>
                    <td>{{ $pelicula->Director }}</td>
                    <td>
                        <a href="{{ url('/pelicula/'.$pelicula->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ url('/pelicula/'.$pelicula->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta película?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $peliculas->links() !!}
</div>
@endsection
