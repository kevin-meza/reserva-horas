@include('pantallas/head')
{{print_r($especialistaEdit->nombre)}}
</select>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Añadir un especialista</h2>
                </div>
                <div class="pull-right">
                    {{-- <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a> --}}
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('especialista.update', $especialistaEdit->id_especialista) }}" method="POST" enctype="multipart/form-data">

            @csrf
{{method_field("PATCH")}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombres:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre Especialista" value="{{$especialistaEdit->nombre}}">
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Apellidos:</strong>
                        <input type="text" name="apellido" class="form-control" placeholder="apellidos"  value="{{$especialistaEdit->apellido}}">
                        @error('apellido')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>rut:</strong>
                        <input type="text" name="rut" class="form-control" placeholder="rut"  value="{{$especialistaEdit->rut}}">
                        @error('rut')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha Nacimiento:</strong>
                        <input type="date" name="fecha_nacimiento" class="form-control" placeholder=""  value="{{$especialistaEdit->fecha_nacimiento}}">
                        @error('fecha_nacimiento')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto:</strong>
                        <input type="file" name="foto" id="foto" class="form-control">
                        @if(isset($especialistaEdit->foto))
                        <img src="{{asset('storage').'/'.$especialistaEdit->foto}}" width="100" class="img-thumbnail img-fluid">

                        @endif
                        @error('foto')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Especialidad:</strong>
                        <select name="id_especialidad" id="id_especialidad" class="form-control">
                            @foreach ($listaEspecialidades as $especialidad)

                             <option value={{$especialidad->id}}>{{$especialidad->especialidad}}</option>


                            @endforeach
                        </select>
                        @error('id_especialidad')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div><br>
                </div> --}}
                <br>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>

        </form>
    </div>
    @include('pantallas/footer')
    @vite('resources/css/app.css')
