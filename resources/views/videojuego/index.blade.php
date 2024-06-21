@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Videojuegos</h2>
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
    <!-- Aquí va la paginación -->
    {!! $videojuegos->links() !!}
</div>
@endsection
