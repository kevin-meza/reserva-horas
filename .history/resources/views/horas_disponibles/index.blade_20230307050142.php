@include('pantallas/head')
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'> --}}
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
   <td>
    {{-- <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="id_especialista" id="especialista" >
@foreach ($listaEspecialistas as $especialista)

        <option value="{{$especialista->id_especialista}}">{{$especialista->nombre." ".$especialista->apellido ." ".$especialista->rut ." ".$especialista->especialidad }} </option>

@endforeach

    </select> --}}
    <div class="form-group">
        <label for="select-input">Selecciona una opción:</label>
        <input type="text" name="id_especialista" class="form-control" list="options-list" id="select-input" placeholder="Escribe para buscar...">
        <datalist id="options-list">
            @foreach ($listaEspecialistas as $especialista)

            <option value="{{$especialista->id_especialista ." ".$especialista->nombre." ".$especialista->apellido." ".$especialista->especialidad }}">{{$especialista->nombre." ".$especialista->apellido ." ".$especialista->rut ." ".$especialista->especialidad }} </option>

    @endforeach
        </datalist>



      </div>
      <div class="form-group">
        <label for="select-input">Selecciona una opción:</label>
        <input type="text" name="id_especialidad" class="form-control" list="options-lists" id="select-input" placeholder="Escribe para buscar...">
        <datalist id="options-lists">
            @foreach ($listaEspecialidades as $especialista)

            <option value="{{$especialista->id_especialista ." ".$especialista->nombre." ".$especialista->apellido." ".$especialista->especialidad }}">{{$especialista->nombre." ".$especialista->apellido ." ".$especialista->rut ." ".$especialista->especialidad }} </option>

    @endforeach
        </datalist>



      </div>
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
