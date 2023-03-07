@include('pantallas/head')

</select>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Company</h2>
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
        <form action="{{ route('especialista.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>nombre:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="Company Name">
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>apellido:</strong>
                        <input type="text" name="apellido" class="form-control" placeholder="Company Name">
                        @error('apellido')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>rut:</strong>
                        <input type="text" name="rut" class="form-control" placeholder="Company Address">
                        @error('rut')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha Nacimiento:</strong>
                        <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Company Name">
                        @error('fecha_nacimiento')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
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
                </div>
                <br>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>

        </form>
    </div>
    @include('pantallas/footer')
