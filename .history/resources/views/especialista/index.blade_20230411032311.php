@include('pantallas/head')

   {{-- <pre>{{$listaEspecialistas}}</pre> --}}
    {{-- <a href="/especialista/create">aa</a> --}}
    @if(session('mensaje'))
    <div class="alert alert-success" id="mensaje">
        {{ session('mensaje') }}
    </div>

@endif


<div class="row">
    <div class="col-10">
    <div class="titulos"> Especialistas</div>
</div>
<div class="col">
    <a href="{{ url ('/especialista/create')}}" class="btn btn-info" role="button">Añadir especialista</a>
</div>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rut</th>
                <th>Fecha</th>
                <th>Especialidad</th>
                <th>Imagen</th>
                <th>Acciones</th>

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
                    {{-- @if(file_exists(public_path('storage').'/'.$especialista->foto)) --}}
                    <img src="{{asset('storage').'/'.$especialista->foto}}" alt="" srcset="" width='100' height="100" class="img-thumbnail img">
                {{-- @else
                    <p>La imagen no existe en la ruta especificada.</p>
                @endif --}}
                {{-- <a href="{{asset('storage').'/'.$especialista->foto}}">link</a> --}}
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
  {!! $listaEspecialistas->links() !!}
  @vite('resources/css/app.css')
@vite(['resources/js/especialista.js'])


</body>
</html>
