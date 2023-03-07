@include('pantallas/head')
    Especialistas
   {{-- <pre>{{$listaEspecialistas}}</pre> --}}
    <a href="/especialista/create">aa</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rut</th>
                <th>Fecha</th>
                <th>Especialidad</th>
                {{-- <th>Imagen</th> --}}

            </tr>
        </thead>
        <tbody>
            @foreach($listaEspecialistas as $especialista)
            <tr>
                <td>{{$especialista->id_especialista}}</td>
                <td scope="row">{{$especialista->nombre}}</td>
                <td>{{$especialista->apellido}}</td>

                <td>{{$especialista->rut}}</td>
                <td>{{$especialista->fecha_nacimiento}}</td>
                <td>{{$especialista->especialidad}}</td>
                <td>
                    {{-- <img src="{{asset('storage').'/'.$persona->imagen}}" alt="" srcset="" width='100' class="img-thumbnail img"> --}}
                    {{-- {{$persona->imagen}} --}}
                </td>
                <td>
                   <a class="btn btn-warning" href="{{url('/especialista/'.$especialista->id_especialista.'/edit')}}">editar </a>

                <form action="{{ url ('/especialista/'.$especialista->id_especialista ) }}" method="post" class="d-inline">
                @csrf
                {{method_field("DELETE")}}
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('quieres borrar?')">
                </form>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
    {!! $listaEspecialistas['listaEspecialistas']->links() !!}

</body>
</html>
