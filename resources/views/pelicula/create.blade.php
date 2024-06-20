{{-- Formulario de creación de pelicula --}}
<form action="{{url('/pelicula')}}" enctype="multipart/form-data" method="post">
    <!--Llave de seguridad e incluimos el formulario de pelicula-->
    @csrf

    <!--Cuando pongo modo, el botón que realice el formulario tendrá el valor que le estoy pasando así se utiliza el formulario reutilizable-->
    @include('pelicula.form', ['modo'=>'Crear']);
</form>