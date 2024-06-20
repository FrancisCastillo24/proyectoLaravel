{{-- Formulario de creación de pelicula --}}
<form action="{{url('/pelicula')}}" method="post" enctype="multipart/form-data">
    @csrf <!--Llave de seguridad e incluimos el formulario de pelicula-->
    @include('pelicula.form');
</form>