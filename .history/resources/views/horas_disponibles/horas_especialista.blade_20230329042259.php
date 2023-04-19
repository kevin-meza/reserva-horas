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



<table>
     @foreach($listaHorasXrut as $horasxRut)

<tr>
    <td >
       {{$horasxRut->id_fecha}}
    </td>
    <td>
        {{$horasxRut->fecha}}
    </td>
    <td>
        {{$horasxRut->hora}}
    </td>
    <td>
        {{$horasxRut->id_especialista}}
    </td>
    <td>
       <input type="text" value="{{$horasxRut->nombre}}">
    </td>
    <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="obtenerValorSeleccionado({{$horasxRut->id_fecha}},'{{$horasxRut->fecha}}','{{$horasxRut->hora}}',{{$horasxRut->id_especialista}},'{{$horasxRut->nombre}}' )">
            Launch demo modal
          </button>
    </td>
</tr>
@endforeach


</table>

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

            @csrf'
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <div>
              <label for="rut">rut:</label>  <input type="text" id="rut" name='rut'>

            </div>
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
function obtenerValorSeleccionado(idFecha,fecha,hora) {
    console.log("El valor seleccionado es: " + fecha);
    // Hacer lo que se necesite con el valor seleccionado


    var id_fecha = idFecha;
var fecha = fecha;
var hora = hora;

// Crear una cadena con los datos que se desean mostrar
var datos = '<input type="text" id="aa" name="aa" value="'+idFecha+'">' +'Nombre: ' + id_fecha +
            '<br>dia: ' + fecha +
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
