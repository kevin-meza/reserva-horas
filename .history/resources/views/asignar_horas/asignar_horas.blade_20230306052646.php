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
    <tr><td>fecha inicio <input type="date" name="fecha" id="fecha"></td></tr>
    <tr><td>fecha fin<input type="date" name="fechaF" id="fecha"></td></tr>
</table>

<table>
    <tr>
        {{-- <td>
   <input type="checkbox" name="hora[]" id="08:00:00" value="08:00:00">08:00
</td>
<td>
    <input type="checkbox" name="hora[]" id="09:00:00" value="09:00:00">09:00
 </td> --}}
 <?php
$horaInicio='09:00:00';

 // Fecha y hora inicial
 $start = new DateTime($horaInicio);

 // Inicializar la variable contador
 $count = 0;

 // Bucle que genera los checkboxes con valores sumados en 1 hora
 for ($i = 0; $i < 10; $i++) {
   // Sumar 1 hora a la fecha y hora actual
   $time = $start->add(new DateInterval('PT1H'));

   // Formatear la fecha y hora en el formato deseado
   $value = $time->format('H:i:s');

   // Generar el checkbox con el valor correspondiente
   if ($count % 2 == 0) {
     echo '<tr>';
   }
   echo '<td><input type="checkbox" name="hora[]" id="' . $value . '" value="' . $value . '">' . $value . '</td>';
   if ($count % 2 == 1) {
     echo '</tr>';
   }

   // Incrementar el contador
   $count++;
 }
 ?>

    </tr>
    <tr><td><input type="submit" value="Aceptar"></td></tr>
</table>
</form>

</body>
</html>
