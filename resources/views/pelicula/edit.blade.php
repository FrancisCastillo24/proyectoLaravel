<!--Formulario de edición de empleado-->
<form action="{{url('/pelicula/'.$pelicula->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('pelicula.form');
</form>