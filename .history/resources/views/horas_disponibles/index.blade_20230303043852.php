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


    <select name="especialista" id="especialista">
@foreach ($listaEspecialistas as $especialista)



        <option value="{{$especialista->rut}}">qaaa  </option>



@endforeach
    </select>
{{-- {{$listaEspecialistas}} --}}
</body>
</html>
