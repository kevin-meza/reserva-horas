@include('pantallas/head')
@if(session('mensaje'))
<div class="alert alert-success" id="mensaje">
    {{ session('mensaje') }}
</div>

@endif
<div class="titulo">Horas Disponibles</div>
<form action="{{ url ('/horas_disponibles/buscar') }}" method="POST" class="d-inline">
    @csrf
    {{-- {{method_field("POST")}} --}}
<table class="table">
<tr>
   <td>

    <div class="form-group" >
        <label for="select-input">Buscar Especialista:</label>
        <input type="text" name="id_especialista" class="form-control" list="options-list" id="select-input" placeholder="Escribe para buscar..." autocomplete="off" required>
        <datalist id="options-list">
            @foreach ($listaEspecialistas as $especialista)

            <option value="{{$especialista->id_especialista ." ".$especialista->nombre." ".$especialista->apellido." ".$especialista->especialidad }}">{{$especialista->nombre." ".$especialista->apellido ." ".$especialista->rut ." ".$especialista->especialidad }} </option>

    @endforeach
        </datalist>
        @error('id_especialista')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror


      </div>

</td>
</tr>
<tr>
    <td>
    <input type="submit" value="Aceptar" class="btn btn-primary">
    </td>
</tr>


</table>
</form>
<br>
<form action="{{ url ('/horas_disponibles/buscarxDia') }}" method="POST" class="d-inline">
    @csrf
    {{-- {{method_field("POST")}} --}}
<table class="table">
    <label for="select-input">Buscar Especialidad:</label>
<tr>
   <td>
     <input type="date" name="fecha" id="fecha" class="form-control">
     @error('fecha')
     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
     @enderror
</td>
<td>
    {{-- <div class="form-group"> --}}
        {{-- <label for="select-input">Selecciona una opción:</label> --}}
        <input type="text" name="id_especialidad" class="form-control" list="options-lists" id="select-input" placeholder="Escribe codigo especialidad  ..." autocomplete="off">
        <datalist id="options-lists">
            @foreach ($listaEspecialidades as $especialidad)

            <option value="{{$especialidad->id." ".$especialidad->especialidad}}">{{$especialidad->especialidad." ".$especialidad->id  }} </option>

    @endforeach
        </datalist>
        @error('id_especialidad')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror

{{--
      </div> --}}



</td>
</tr>
<tr>
    <td>
    <input type="submit" value="Aceptar" class="btn btn-primary">
    </td>
</tr>





</table>
</form>


@include('pantallas/footer')
@vite(['resources/js/especialista.js'])
