<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>horas_disponibles</title>
</head>
<body>
horas disponibles
<table>
<tr>
    <select name="especialista" id="especialista">
@foreach ($listaEspecialistas as $especialista)

        <option value="{{$especialista->id_especialista}}">{{$especialista->nombre." ".$especialista->apellido }} </option>

@endforeach

    </select>
</tr>
{{-- {{$listaEspecialistas}} --}}
</table>
</body>
</html>
