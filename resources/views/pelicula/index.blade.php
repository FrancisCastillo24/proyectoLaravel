<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Portada</th>
            <th>Title</th>
            <th>Description</th>
            <th>Release_date</th>
            <th>Runtime</th>
            <th>Director</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peliculas as $pelicula)
        <tr>
            <td>{{$pelicula->id}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$pelicula->Photo }}" width="100" alt="">
            </td>
            <td>{{$pelicula->Title}}</td>
            <td>{{$pelicula->Description}}</td>
            <td>{{$pelicula->Release_date}}</td>
            <td>{{$pelicula->Runtime}}</td>
            <td>{{$pelicula->Director}}</td>
            <td>
                <a href="{{url('/pelicula/'.$pelicula->id.'/edit')}}">Editar</a>
            </td>
            <td>
                <form action="{{url('/pelicula/'.$pelicula->id)}}" method="post">
                    @csrf <!--Llave de seguridad-->

                    <!--php artisan route:list y te aparece el método que se necesita para el borrado -->
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Estas seguro de eliminar?')" value="Eliminar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>