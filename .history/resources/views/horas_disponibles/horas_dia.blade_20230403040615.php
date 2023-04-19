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


@foreach($listaHorasxDia as $horasxDia)


    <table>
        <tr><td>{{$horasxDia->id_especialista}}</td></tr>


    </table>
   {{$id_especialista=$horasxDia->id_especialista}}
@endforeach
</body>
</html>
