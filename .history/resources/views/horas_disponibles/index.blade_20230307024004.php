@include('pantallas/head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-D1q3YtY/M8Glr+ki1mxpXsXs76Rxxo8iNzF0vIZaL7NwRavM2/7DTxqwvA99aq3ljOeChIl8iuAKm5+m+wLFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
horas disponibles
<form action="{{ url ('/horas_disponibles/buscar') }}" method="POST" class="d-inline">
    @csrf
    {{-- {{method_field("POST")}} --}}
<table class="table">
<tr>
   <td>   <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="id_especialista" id="especialista" class="form-control">
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

<form action="{{ url ('/horas_disponibles/buscarxDia') }}" method="POST" class="d-inline">
    @csrf
    {{-- {{method_field("POST")}} --}}
<table class="table">
<tr>
   <td>
     <input type="date" name="fecha" id="fecha" class="form-control">
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

@include('pantallas/footer')
