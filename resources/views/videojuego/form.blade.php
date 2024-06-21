<!-- FORMULARIO REUTILIZABLE PARA VIDEOJUEGOS -->
<div class="container">
    <h1>{{ $modo }} videojuego</h1>

    <!-- Mostrar errores de validación -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ url('/videojuego') }}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="form-group">
            <label for="Title">Nombre del videojuego</label>
            <input type="text" class="form-control" name="Title" value="{{ old('Title', isset($videojuego->Title) ? $videojuego->Title : '') }}" id="Title">
        </div>

        <div class="form-group">
            <label for="Description">Descripción del videojuego</label>
            <textarea class="form-control" name="Description" id="Description" rows="3">{{ old('Description', isset($videojuego->Description) ? $videojuego->Description : '') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="Ventas">Número de ventas</label>
            <input type="number" class="form-control" name="Ventas" value="{{ old('Ventas', isset($videojuego->Ventas) ? $videojuego->Ventas : '') }}" id="Ventas">
        </div>
        

        <div class="form-group">
            <label for="Photo">Añadir foto</label>
            @if(isset($videojuego->Photo))
            <div>
                <img src="{{ asset('storage').'/'.$videojuego->Photo }}" width="100" alt="Foto del videojuego">
            </div>
            @endif
            <input type="file" class="form-control-file" name="Photo" id="Photo">
        </div><br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $modo }}</button>
            <a href="{{ url('videojuego') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
</div>
