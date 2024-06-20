{{-- Formulario de creación de pelicula --}}
<form action="{{url('/pelicula')}}" enctype="multipart/form-data" method="post">
    @csrf <!--Llave de seguridad e incluimos el formulario de pelicula-->
    @include('pelicula.form');
</form>