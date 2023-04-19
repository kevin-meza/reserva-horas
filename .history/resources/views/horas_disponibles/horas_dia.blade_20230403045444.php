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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id_especialista="{{ $horasxDia->id_especialista }}" data-id_fecha="{{ $horasxDia->id_fecha }}" data-hora="{{ $horasxDia->hora }}">
                    Ver detalles
                </button>
            </td>
        </tr>
    </table>
@endforeach


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detalles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Id especialista: <span id="modal-id_especialista"></span></p>
                <p>Id fecha: <span id="modal-id_fecha"></span></p>
                <p>Hora: <span id="modal-hora"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
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
