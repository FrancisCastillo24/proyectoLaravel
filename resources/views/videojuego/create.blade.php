{{-- Formulario de creación de videojuegos --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/videojuego') }}" enctype="multipart/form-data" method="post">
        @csrf
        @include('videojuego.form', ['modo' => 'Crear'])
    </form>
</div>
@endsection
