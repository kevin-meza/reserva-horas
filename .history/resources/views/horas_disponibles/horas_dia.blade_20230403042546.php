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
$id_especialista =0;
@endphp

@foreach($listaHorasxDia as $horasxDia)
@php
$id_especialista=$horasxDia->id_especialista;
@endphp
    <table>
        @if ($id_especialista == $id_especialista)

        <tr><td>{{$horasxDia->id_especialista}}</td>

        <td>{{$horasxDia->nombre}}</td>


    </tr>

        @endif

    </table>



@endforeach
</body>
</html>
