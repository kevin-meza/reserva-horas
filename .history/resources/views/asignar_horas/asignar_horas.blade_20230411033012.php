@include('pantallas/head')
<form action="{{ route('asignar_horas.store') }}" method="POST">
@csrf
{{method_field("POST")}}
<table class="table">
    <tr><td>fecha inicio <input type="date" name="fecha" id="fecha" class="form-control"></td></tr>
    <tr><td>fecha fin<input type="date" name="fechaF" id="fecha" class="form-control"></td></tr>
</table>

<table class="table">
    {{-- @foreach ($listaEspecialistas as $especialista)
        {{$especialista->nombre}}
    @endforeach --}}
    <tr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Especialista:</strong>
                <select name="id_especialista" id="id_especialista" class="form-control">
                    @foreach ($listaEspecialistas as $especialista)

                     <option value={{$especialista->id_especialista}}>{{$especialista->nombre." ".$especialista->apellido." ".$especialista->rut." ".$especialista->especialidad}}</option>


                    @endforeach
                </select>
    </tr><br>
    <tr>
 <?php
$horaInicio='08:00:00';
$horasTrabajo=12;

 // Fecha y hora inicial
 $start = new DateTime($horaInicio);

 // Inicializar la variable contador
 $count = 0;

 // Bucle que genera los checkboxes con valores sumados en 1 hora
 for ($i = 0; $i < $horasTrabajo; $i++) {
   // Sumar 1 hora a la fecha y hora actual
   $time = $start->add(new DateInterval('PT1H'));

   // Formatear la fecha y hora en el formato deseado
   $value = $time->format('H:i:s');

   // Generar el checkbox con el valor correspondiente
   if ($count % 2 == 0) {
     echo '<tr>';
   }
   echo '<td><input type="checkbox" class="form-check-input" name="hora[]" id="' . $value . '" value="' . $value . '">' . $value . '</td>';
   if ($count % 2 == 1) {
     echo '</tr>';
   }

   // Incrementar el contador
   $count++;
 }
 ?>

    </tr>
    <tr><td><button type="submit" class="btn btn-primary">Primary</button></td></tr>
</table>
</form>

</body>
<script>
    function selectAll() {
      var checkboxes = document.getElementsByName('hora[]');
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
      }
    }
    function deselectAll() {
      var checkboxes = document.getElementsByName('hora[]');
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
      }
    }
    </script>
    <button onclick="selectAll()">Seleccionar todo</button>
    <button onclick="deselectAll()">Deseleccionar todo</button>
</html>
