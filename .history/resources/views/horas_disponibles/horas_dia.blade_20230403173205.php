@include('pantallas/head')

<!--<table>


    <tr>
        <td>
            <select name="id_fecha" id="id_fecha">
                @foreach($listaHorasxDia as $horasxDia)
                    <option value="{{$horasxDia->id_fecha}}">{{$horasxDia->fecha." ".$horasxDia->hora." ".$horasxDia->nombre." ".$horasxDia->id_fecha}}</option>

                {{-- {{$horasxDia->fecha}} --}}

                @endforeach

            </select>
        </td>
    </tr>
</table>!-->
@php
$prev_id_especialista = null;


$id=$id_especialidad ;
@endphp


@foreach($listaHorasxDia as $horasxDia)
@php
$id_especialista=$horasxDia->id_especialista;
@endphp
    <table class="default">
        @if ($id_especialista != $prev_id_especialista)
        <!-- Imprimir el nombre del especialista -->
        <h3>{{ $horasxDia->nombre ."                     fecha   ". $horasxDia->fecha }}</h4>

        @php
        $prev_id_especialista = $id_especialista;
        @endphp
    @endif

    <!-- Imprimir la tabla de horas para el especialista actual -->
    <table>
        <tr>
            <td>{{ $horasxDia->id_especialista }}</td>
            <td>{{ $horasxDia->id_fecha }}</td>
            <td>{{ $horasxDia->hora }}</td>
            {{-- <td>{{ $id_especialidad }}</td> --}}

            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="obtenerValorSeleccionado({{$horasxDia->id_fecha}},'{{$horasxDia->fecha}}','{{$horasxDia->hora}}',{{$horasxDia->id_especialista}},'{{$horasxDia->nombre.' '.$horasxDia->apellido}}',{{$id_especialidad}} )">
                    Launch demo modal
                  </button>
            </td>
        </tr>
    </table>
@endforeach


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">



        </div>
        <div class="modal-body">
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
            </table>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </form>
        </div>
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
var datos = '<form><input type="hidden" id="id_fecha" name="id_fecha" value="'+idFecha+'">' +
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
  var modalBody = modal.querySelector('.modal-header');

  // Establecer el contenido del elemento con los datos
  modalBody.innerHTML = '<p>' + datos + '</p>';

  // Mostrar el modal
//   $(modal).modal('show');
}






// Variable con los datos que se desean mostrar en el modal

</script>
</html>
