@include('pantallas/head')
<table>


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
</table>
@php
$prev_id_especialista = null;
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
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  data-id_especialista="{{ $horasxDia->id_especialista }}" data-id_fecha="{{ $horasxDia->id_fecha }}" data-hora="{{ $horasxDia->hora }}">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="nombre" id="nombre">
          <input type="text" name="apellido" id="apellido">
          <p>Id especialista: <span id="modal-id_especialista"></span></p>
          <p>Id fecha: <span id="modal-id_fecha"></span></p>
          <p>Hora: <span id="modal-hora"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {

        var id_especialista = button.data('id_especialista'); // Extraer la información del botón
        var id_fecha = button.data('id_fecha');
        var hora = button.data('hora');
        var modal = $(this);
        modal.find('#modal-id_especialista').text(id_especialista); // Actualizar el contenido del modal
        modal.find('#modal-id_fecha').text(id_fecha);
        modal.find('#modal-hora').text(hora);
    })
</script>
</html>
