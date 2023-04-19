@include('pantallas/head')
@if(session('mensaje'))
<div class="alert alert-success" id="mensaje">
    {{ session('mensaje') }}
</div>

@endif
<div class="titulo">
    Asignar Horas a Especialistas
</div>
<form action="{{ route('asignar_horas.store') }}" method="POST">
@csrf
{{method_field("POST")}}
<table class="table">
    <tr><td>Fecha Inicio <input type="date" name="fecha" id="fecha" class="form-control">
        @error('fecha')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </td></tr>
    <tr><td>Fecha Fin<input type="date" name="fechaF" id="fecha" class="form-control">
        @error('fechaF')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror</td></tr>
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
        <h3>asignar</h3>
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
    <tr><td><button type="submit" class="btn btn-primary">Guardar</button></td></tr>
</table>
</form>


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


@include('pantallas/footer')
