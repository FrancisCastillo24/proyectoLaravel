<!--Formulario de edición de empleado-->
<form action="{{url('/pelicula/'.$pelicula->id)}}" enctype="multipart/form-data" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('pelicula.form');
</form>