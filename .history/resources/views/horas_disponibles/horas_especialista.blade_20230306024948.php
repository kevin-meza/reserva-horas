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
    @foreach($listaHorasXrut as $horasxRut)
    <tr>
        <td><select name="id_fecha" id="id_fecha">
            <option value="{{$horasxRut->id_fecha}}"></option>
        </select>
            {{$horasxRut->fecha}}
        </td>
    </tr>
@endforeach
</table>
</body>
</html>
