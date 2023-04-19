@include('pantallas/head')


@php
$prev_id_especialista = null;
// print_r($listaHorasxDia);

$id=$id_especialidad ;
@endphp

<table class="table">
@foreach($listaHorasxDia as $horasxDia)
@php
$id_especialista=$horasxDia->id_especialista;
@endphp

        @if ($id_especialista != $prev_id_especialista)
        <!-- Imprimir el nombre del especialista -->
        <tr>
            <td><h1>{{$horasxDia->nombre.' '.$horasxDia->apellido}}</h1></td>


            {{-- <td>{{$horasxDia->apellido}}</td> --}}
            <td><h1>{{$horasxDia->fecha}}</h1></td>
        </tr>
        {{-- <h3>{{ $horasxDia->nombre ."                     fecha   ". $horasxDia->fecha }}</h4> --}}

        @php
        $prev_id_especialista = $id_especialista;
        @endphp
    @endif

    <!-- Imprimir la tabla de horas para el especialista actual -->

        <tr>
            {{-- <td>{{ $horasxDia->id_especialista }}</td>
            <td>{{ $horasxDia->id_fecha }}</td> --}}
            <td>{{ $horasxDia->hora }}</td>
            {{-- <td>{{ $id_especialidad }}</td> --}}

            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="obtenerValorSeleccionado({{$horasxDia->id_fecha}},'{{$horasxDia->fecha}}','{{$horasxDia->hora}}',{{$horasxDia->id_especialista}},'{{$horasxDia->nombre.' '.$horasxDia->apellido}}',{{$id_especialidad}} )">
                    Launch
                  </button>
            </td>
        </tr>

@endforeach
</table>
{{--
<div class="card" style="width: 18rem;">
    <img src="{{asset('storage/uploads/ImagenEspecialista/default.jpg')}}"
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">An item</li>
      <li class="list-group-item">A second item</li>
      <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a>
    </div>
  </div> --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">



        </div>
        <form action="{{ url ('/horas_disponibles/store') }}" method="POST">
            @csrf
        <div class="modal-body">





        </div>
        <div class="modal-footer">
            <table>
                <tr>
                    <td><label for="nombre">Nombre</label></td>
                    <td><input type="text" name="nombre" id="nombre"></td>
                </tr>
                <tr>
                    <td><label for="apellido">apellido</label></td>
                    <td><input type="text" name="apellido" id="apellido"></td>
                </tr>
                <tr>
                    <td><label for="rut">rut</label></td>
                    <td> <input type="text" name="rut" id="rut"></td>
                </tr>
                <tr>
                    <td><label for="fecha">fecha nacim</label></td>
                    <td> <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"></td>
                </tr>
                <tr>
                    <td>  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submmit" class="btn btn-primary">Save changes</button></td>
                </tr>
            </table>



        </div>
        </form>
      </div>
    </div>
  </div>
</body>
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
            '<div class="row"><div class="col">dia: ' + fecha +'</div>'+
            '<div class="col">especialidad: ' + id_especialidad +'</div></div>'+
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
</html>
