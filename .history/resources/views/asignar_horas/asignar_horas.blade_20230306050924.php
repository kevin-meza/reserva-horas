<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>asignar_horas</title>
</head>
<body>
<form action="{{ route('asignar_horas.store') }}" method="POST">
@csrf
{{method_field("POST")}}
<table>
    <tr><td>fecha inicio <input type="date" name="" id=""></td></tr>
    <tr><td>fecha fin</td></tr>
</table>

<table>
    <tr>
        <td>
   <input type="checkbox" name="hora[]" id="08:00:00" value="08:00:00">08:00
</td>
<td>
    <input type="checkbox" name="hora[]" id="09:00:00" value="09:00:00">09:00
 </td>
    </tr>
    <tr><td><input type="submit" value="Aceptar"></td></tr>
</table>
</form>

</body>
</html>
