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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="obtenerValorSeleccionado({{$horasxDia->id_fecha}},'{{$horasxDia->fecha}}','{{$horasxDia->hora}}',{{$horasxDia->id_especialista}},'{{$horasxDia->nombre.' '.$horasxDia->apellido}}',{{$horasxDia->id_especialidad}} )">
                    Launch demo modal
                  </button>
            </td>
        </tr>
    </table>
@endforeach
</body>
</html>
