@include('pantallas/head')
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
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
    <div class="form-floating">
        <input type="search" class="form-control" id="search" placeholder="Buscar especialista">
        <label for="search">Buscar especialista</label>
      </div>
    <div class="select-container">
   <td>   <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="id_especialista" id="especialista" >
@foreach ($listaEspecialistas as $especialista)

        <option value="{{$especialista->id_especialista}}">{{$especialista->nombre." ".$especialista->apellido }} </option>

@endforeach

    </select>
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
<script>
    const select = document.getElementById('especialista');
    const search = document.getElementById('search');

    search.addEventListener('input', function() {
      const value = this.value.toLowerCase();

      for (let i = 0; i < select.options.length; i++) {
        const option = select.options[i];

        if (option.text.toLowerCase().includes(value)) {
          option.style.display = '';
        } else {
          option.style.display = 'none';
        }
      }
    });
    </script>

@include('pantallas/footer')
