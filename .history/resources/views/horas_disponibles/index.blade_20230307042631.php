@include('pantallas/head')

horas disponibles
<form action="{{ url ('/horas_disponibles/buscar') }}" method="POST" class="d-inline">
    @csrf
    {{-- {{method_field("POST")}} --}}
<table class="table">
<tr>
   <td>
    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="id_especialista" id="especialista" >
@foreach ($listaEspecialistas as $especialista)

        <option value="{{$especialista->id_especialista}}">{{$especialista->nombre." ".$especialista->apellido ." ".$especialista->rut ." ".$especialista->especialidad }} </option>

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

</td>
<td>
    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="id_especialidad" id="id_especialidad" >
        @foreach ($listaEspecialidades as $especialidad)

                <option value="{{$especialidad->id}}">{{$especialidad->especialidad." ".$especialidad->id  }} </option>

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

@include('pantallas/footer')
