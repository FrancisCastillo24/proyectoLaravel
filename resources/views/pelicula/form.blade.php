<!--Formulario que tendrá los datos en común con create y edit-->

<!--FORMULARIO REUTILIZABLE-->
<label for="Title">Nombre de la película</label>
<input type="text" name="Title" value="{{$pelicula->Title}}" id="Title"><br><br>

<label for="Description">Descripción de la película</label>
<input type="text" name="Description" value="{{$pelicula->Description}}" id="Description"><br><br>

<label for="Release_date">Fecha lanzamiento de la película</label>
<input type="date" name="Release_date" value="{{$pelicula->Release_date}}" id="Release_date"><br><br>

<label for="Runtime">Duración de la película</label>
<input type="number" name="Runtime" value="{{$pelicula->Runtime}}" id="Runtime"><br><br>

<label for="Director">Director de la película</label>
<input type="text" name="Director" value="{{$pelicula->Director}}" id="Director"><br><br>

<label for="Photo">Añadir foto</label>
<img src="{{asset('storage').'/'.$pelicula->Photo}}" width="100" alt="">
<input type="file" name="Photo" value="" id="Photo"><br><br>

<input type="submit" value="Guardar datos">