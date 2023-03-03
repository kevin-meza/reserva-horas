<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                {{-- <th>Imagen</th> --}}

            </tr>
        </thead>
        <tbody>
            @foreach($listaPersonas as $persona)
            <tr>

                <td scope="row">{{$persona->nombre}}</td>
                <td>{{$persona->apellido}}</td>
                <td>{{$persona->edad}}</td>
                <td>
                    {{-- <img src="{{asset('storage').'/'.$persona->imagen}}" alt="" srcset="" width='100' class="img-thumbnail img"> --}}
                    {{-- {{$persona->imagen}} --}}
                </td>
                <td>
                   <a class="btn btn-warning" href="{{url('/persona/'.$persona->id.'/edit')}}">editar </a>

                <form action="{{ url ('/persona/'.$persona->id ) }}" method="post" class="d-inline">
                @csrf
                {{method_field("DELETE")}}
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('quieres borrar?')">
                </form>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
    {!! $listaPersonas->links() !!}

</body>
</html>
