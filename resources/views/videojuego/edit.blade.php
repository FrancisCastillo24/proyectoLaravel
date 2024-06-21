<!--Formulario de editar videojuegos-->
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/videojuego/'.$videojuego->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        {{ method_field('PATCH') }}
        @include('videojuego.form', ['modo' => 'Editar'])
    </form>
</div>
@endsection
