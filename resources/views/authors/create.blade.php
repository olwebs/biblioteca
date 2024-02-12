@extends('.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Nuevo/a Autor/a</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Autores/as</a></li>
                        <li class="breadcrumb-item active">Registrar Nuevo/a Autor/a</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Datos Nuevo/a Autor/a</h3>
                </div>
                <div class="card-body">
                    {{--
                  @foreach ($errors->all() as $error)
                      <li class="alert alert-danger">{{$error}}</li>
                  @endforeach
                 --}}
                    <form action="{{ route('authors.store') }}" method="POST">
                        <div class="row">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre:* </label> <input type="text" name="name"
                                        value="{{ old('name') }}" class="form-control">
                                    @error('name')
                                        <small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Estado: </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" id="estado1" value=1 {{ old('state') == 1 ? 'checked' : "" }}>
                                        <label class="form-check-label" for="estado1">
                                            Activo/a
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" id="estado0" value=0 {{ old('state') == 0 ? 'checked' : "" }}>
                                        <label class="form-check-label" for="estado0">
                                            Inactivo/a
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 text-right">
                                <a href="{{route('authors.index')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar Registro</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento: </label> <input type="date" name="birthdate"
                                    value="{{ old('birthdate') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Género: </label> 
                                    <select name="gender"
                                        id="" value="{{ old('gender') }}" class="form-control">
                                        <option value="">Elige una opción</option>
                                        <option value="FEMENINO" {{ old('gender') == "FEMENINO" ? 'selected' : "" }}>FEMENINO</option>
                                        <option value="MASCULINO" {{ old('gender') == "MASCULINO" ? 'selected' : "" }}>MASCULINO</option>
                                        <option value="OTRO" {{ old('gender') == "OTRO" ? 'selected' : "" }}>OTRO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
