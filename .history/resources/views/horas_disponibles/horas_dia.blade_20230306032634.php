<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>


    <tr>
        <td><select name="id_fecha" id="id_fecha">
        @foreach($listaHorasxDia as $horasxDia)
            <option value="{{$horasxDia->id_fecha}}">{{$horasxDia->fecha." ".$horasxDia->nombre}}</option>

            {{-- {{$horasxRut->fecha}} --}}

@endforeach
</td>
</tr>
</select>
</table>
</body>
</html>
