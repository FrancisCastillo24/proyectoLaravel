<!--FORMULARIO REUTILIZABLE-->
<h1>{{ $modo }} película</h1>

<div class="form-group">
    <label for="Title">Nombre de la película</label>
    <input type="text" class="form-control" name="Title" value="{{ old('Title', isset($pelicula->Title) ? $pelicula->Title : '') }}" id="Title" required>
</div>

<div class="form-group">
    <label for="Description">Descripción de la película</label>
    <input type="text" class="form-control" name="Description" value="{{ old('Description', isset($pelicula->Description) ? $pelicula->Description : '') }}" id="Description" required>
</div>

<div class="form-group">
    <label for="Release_date">Fecha de lanzamiento</label>
    <input type="date" class="form-control" name="Release_date" value="{{ old('Release_date', isset($pelicula->Release_date) ? $pelicula->Release_date : '') }}" id="Release_date" required>
</div>

<div class="form-group">
    <label for="Runtime">Duración (minutos)</label>
    <input type="number" class="form-control" name="Runtime" value="{{ old('Runtime', isset($pelicula->Runtime) ? $pelicula->Runtime : '') }}" id="Runtime" required>
</div>

<div class="form-group">
    <label for="Director">Director de la película</label>
    <input type="text" class="form-control" name="Director" value="{{ old('Director', isset($pelicula->Director) ? $pelicula->Director : '') }}" id="Director" required>
</div>

<div class="form-group">
    <label for="Photo">Añadir foto</label>
    @if(isset($pelicula->Photo))
    <div>
        <img src="{{ asset('storage').'/'.$pelicula->Photo }}" width="100" alt="Foto de la película">
    </div><br>
    @endif
    <input type="file" class="form-control-file" name="Photo" id="Photo">
</div><br>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $modo }}</button>
    <a href="{{ url('pelicula/') }}" class="btn btn-secondary">Regresar</a>
</div>
