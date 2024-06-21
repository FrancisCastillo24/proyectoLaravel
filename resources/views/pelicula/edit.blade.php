<!--Formulario de editar peliculas-->
@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/pelicula/'.$pelicula->id)}}" enctype="multipart/form-data" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('pelicula.form', ['modo'=>'Editar']);
</form>
@endsection