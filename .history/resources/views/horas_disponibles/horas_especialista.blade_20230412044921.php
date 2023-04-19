@include('pantallas/head')
<body>
{{-- <table>


    <tr>
        <td><select name="id_fecha" id="id_fecha">
        @foreach($listaHorasXrut as $horasxRut)
            <option value="{{$horasxRut->id_fecha}}">{{$horasxRut->fecha." ".$horasxRut->hora}}</option>

            {{$horasxRut->fecha}}

@endforeach
</td>
</tr>
</select>
</table> --}}
@php
$prev_fecha = null;
// print_r($listaHorasxDia);


@endphp

{{-- <table class="table">
    @foreach($listaHorasXrut->groupBy('fecha') as $fecha => $horasxRut)
        <tr> --}}
            {{-- TRANSFORMAL LA FECHA EN PALABRAS --}}
            {{-- <td><h1>{{ \Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd D [de] MMMM [del] YYYY') }}</h1></td>

        </tr>
        @foreach($horasxRut as $hora)
            <tr>
                <td>{{ $hora->hora }}</td>

                <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="obtenerValorSeleccionado(@foreach($listaHorasXrut as $horasxRut){{$horasxRut->id_fecha}},'{{$horasxRut->fecha}}','{{$horasxRut->hora}}',{{$horasxRut->id_especialista}},'{{$horasxRut->nombre.' '.$horasxRut->apellido}}',{{$horasxRut->id_especialidad}}@endforeach )">ad</button> </td>

                </tr>
        @endforeach
    @endforeach
    </table> --}}







    @php
    // Convertir la colección en un arreglo
    $listaHorasXrutArray = $listaHorasXrut->toArray();

    // Agrupar los datos por fecha en un arreglo de fechas
    $fechas = array_reduce($listaHorasXrutArray, function ($fechas, $hora) {
        $fecha = $hora['fecha'];
        $fechas[$fecha][] = $hora;
        return $fechas;
    }, []);
@endphp

@foreach ($fechas as $fecha => $horas)
    <h2>{{ $fecha }}</h2>
    <table>
        @foreach ($horas as $hora)
            <tr>
                <td>{{ $hora['id_fecha'] }}</td>
                <td>{{ $hora['fecha'] }}</td>
                <td>{{ $hora['hora'] }}</td>
                <td><input type="hidden" value="{{ $hora['id_especialidad'] }}"></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="obtenerValorSeleccionado({{ $hora['id_fecha'] }}, '{{ $hora['fecha'] }}', '{{ $hora['hora'] }}', {{ $hora['id_especialista'] }}, '{{ $hora['nombre'].' '.$hora['apellido'] }}', {{ $hora['id_especialidad'] }})">
                        Launch demo modal
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endforeach

<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


        </div>
        <form action="{{ url ('/horas_disponibles/store') }}" method="POST">

            @csrf
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <div>
              <label for="rut">rut:</label>  <input type="text" id="rut" name='rut'>

            </div>
            <div>
                <label for="nombre">nombre:</label>  <input type="text" id="nombre" name='nombre'>

              </div>
              <div>
                <label for="apellido">apellido:</label>  <input type="text" id="apellido" name='apellido'>

              </div>
              <div>
                <label for="fecha">fecha:</label>  <input type="date" id="fecha_nacimiento" name='fecha_nacimiento'>

              </div><br>
            <div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submmit" class="btn btn-primary">Save changes</button>
        </div>

    </form>
        </div>
      </div>
    </div>
  </div>
<script>


var modal = document.querySelector('#exampleModal');

// Función para mostrar el modal con datos
var modal = document.querySelector('#exampleModal');



// Iterar sobre cada fila y obtener los valores necesarios
function obtenerValorSeleccionado(idFecha,fecha,hora,id_especialista,nombre,id_especialidad) {
    console.log("El valor seleccionado es: " + fecha);
    // Hacer lo que se necesite con el valor seleccionado


    var id_fecha = idFecha;
var fecha = fecha;
var hora = hora;
var id_especialista =id_especialista;
var nombre= nombre;
var id_especialidad =id_especialidad;

// Crear una cadena con los datos que se desean mostrar
var datos = '<input type="hidden" id="id_fecha" name="id_fecha" value="'+idFecha+'">' +
'<input type="hidden" id="id_especialista" name="id_especialista" value="'+id_especialista+'">'  +
'<input type="hidden" id="id_especialidad" name="id_especialidad" value="'+id_especialidad+'">'  +
            '<br>dia: ' + fecha +
            '<br>especialidad: ' + id_especialidad +
            '<br>especialista: ' + nombre +
            '<br>hora: ' + hora+'';

// Llamar a la función para mostrar el modal con los datos
mostrarModal(datos);

  }



// Función para mostrar el modal con datos
function mostrarModal(datos) {
  // Seleccionar el elemento donde se mostrarán los datos
  var modalBody = modal.querySelector('.modal-body');

  // Establecer el contenido del elemento con los datos
  modalBody.innerHTML = '<p>' + datos + '</p>';

  // Mostrar el modal
//   $(modal).modal('show');
}






// Variable con los datos que se desean mostrar en el modal

</script>
</body>
</html>
