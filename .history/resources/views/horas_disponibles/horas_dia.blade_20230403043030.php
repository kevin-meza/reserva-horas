@include('pantallas/head')
<table>


    <tr>
        <td>
            <select name="id_fecha" id="id_fecha">
                @foreach($listaHorasxDia as $horasxDia)
                    <option value="{{$horasxDia->id_fecha}}">{{$horasxDia->fecha." ".$horasxDia->hora." ".$horasxDia->nombre." ".$horasxDia->id_fecha}}</option>

                {{-- {{$horasxRut->fecha}} --}}

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
    <table>
        @if ($id_especialista != $prev_id_especialista)
        <!-- Imprimir el nombre del especialista -->
        <h2>{{ $horasxDia->nombre }}</h2>
        @php
        $prev_id_especialista = $id_especialista;
        @endphp
    @endif

    <!-- Imprimir la tabla de horas para el especialista actual -->
    <table>
        <tr>
            <td>{{ $horasxDia->id_especialista }}</td>
            td>{{ $horasxDia->id_fecha }}</td>
            {{-- <td>{{ $horasxDia->nombre }}</td> --}}
        </tr>
    </table>
@endforeach
</body>
</html>
