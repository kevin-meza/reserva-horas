@include('pantallas/head')
<table>


    <tr>
        <td><select name="id_fecha" id="id_fecha">
        @foreach($listaHorasxDia as $horasxDia)
            <option value="{{$horasxDia->id_fecha}}">{{$horasxDia->fecha." ".$horasxDia->hora." ".$horasxDia->nombre}}</option>

            {{-- {{$horasxRut->fecha}} --}}

@endforeach
</td>
</tr>
</select>
</table>
</body>
</html>
