<!--Formulario que tendrá los datos en común con create y edit-->

<!--FORMULARIO REUTILIZABLE-->
<!--Al ser un formulario reutilizable, cuando editemos nos muestra su información original, pero si creamos no debe mostrarlo, por lo que nos aseguramos de que exista o no-->
<h1>{{$modo}} pelicula</h1>
<label for="Title">Nombre de la película</label>
<input type="text" name="Title" value="{{isset($pelicula->Title) ? $pelicula->Title : ''}}" id="Title"><br><br>

<label for="Description">Descripción de la película</label>
<input type="text" name="Description" value="{{isset($pelicula->Description) ? $pelicula->Description : ''}}" id="Description"><br><br>

<label for="Release_date">Fecha lanzamiento de la película</label>
<input type="date" name="Release_date" value="{{isset($pelicula->Release_date) ? $pelicula->Release_date : ''}}" id="Release_date"><br><br>

<label for="Runtime">Duración de la película</label>
<input type="number" name="Runtime" value="{{isset($pelicula->Runtime) ? $pelicula->Runtime : ''}}" id="Runtime"><br><br>

<label for="Director">Director de la película</label>
<input type="text" name="Director" value="{{isset($pelicula->Director) ? $pelicula->Director : ''}}" id="Director"><br><br>

<label for="Photo">Añadir foto</label>
@if(isset($pelicula->Photo))
<img src="{{asset('storage').'/'.$pelicula->Photo}}" width="100" alt="">
@endif
<input type="file" name="Photo" value="" id="Photo"><br><br>
<!--Cada botón de formulario tendrá su valor-->
<input type="submit" value="{{$modo}}"><br><br>
<a href="{{url('pelicula/')}}">Regresar</a>