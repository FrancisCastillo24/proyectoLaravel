@extends('layouts.app')

@section('content')
<div class="container my-5" style="background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Listado de Videojuegos</h2>
        <a href="{{ url('videojuego/create') }}" class="btn btn-primary">Registrar Videojuego</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Código</th>
                    <th>Portada</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Ventas</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videojuegos as $videojuego)
                <tr>
                    <td>{{ $videojuego->id }}</td>
                    <td>
                        <img src="{{ asset('storage').'/'.$videojuego->Photo }}" width="100" alt="{{ $videojuego->Title }}">
                    </td>
                    <td>{{ $videojuego->Title }}</td>
                    <td>{{ $videojuego->Description }}</td>
                    <td>{{ $videojuego->Ventas }}</td>
                    <td>
                        <a href="{{ url('/videojuego/'.$videojuego->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ url('/videojuego/'.$videojuego->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este videojuego?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $videojuegos->links() !!}
</div>
@endsection
