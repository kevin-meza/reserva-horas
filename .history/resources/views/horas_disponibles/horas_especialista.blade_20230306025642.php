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
        @foreach($listaHorasXrut as $horasxRut)
            <option value="{{$horasxRut->id_fecha}}">{{$horasxRut->fecha}}{{{{$horasxRut->hora}}}}</option>

            {{$horasxRut->fecha}}

@endforeach
</td>
</tr>
</select>
</table>
</body>
</html>
