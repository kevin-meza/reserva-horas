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
<form action="{{ url ('/horas_disponibles/') }}" method="post" class="d-inline">
    @csrf

<table>
<tr>
   <td> <select name="especialista" id="especialista">
@foreach ($listaEspecialistas as $especialista)

        <option value="{{$especialista->id_especialista}}">{{$especialista->nombre." ".$especialista->apellido }} </option>

@endforeach

    </select>
</td>
</tr>
<tr>
    <td>
    <input type="submit" value="aceptar">
    </td>
</tr>


</table>
</form>

</body>
</html>
