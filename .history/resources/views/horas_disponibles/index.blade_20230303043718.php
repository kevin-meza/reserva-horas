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
    <select name="especialista" id="especialista">
@foreach ($listaEspecialistas as $especialista)
<tr>
<td>

        <option value="{{$especialista->nombre}}">qaaa  </option>

</td>
</tr>
@endforeach
</select>
</table>
{{$listaEspecialistas}}
</body>
</html>
