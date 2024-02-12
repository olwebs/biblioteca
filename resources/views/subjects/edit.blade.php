@extends('.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Materia</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('subjects.index') }}">Materias</a></li>
                        <li class="breadcrumb-item active">Editar Materia</li>
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
                    <h3 class="card-title">Datos Editar Materia</h3>
                </div>
                <div class="card-body">
                {{--
                  @foreach ($errors->all() as $error)
                      <li class="alert alert-danger">{{$error}}</li>
                  @endforeach
                 --}}
                    <form action="{{ route('subjects.update', $materia->id) }}" method="POST">
                        <div class="row">
                            @csrf
                            @method('put')
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre:* </label> <input type="text" name="name" value="{{ $materia->name }}" class="form-control">
                                    @error('name')
                                        <small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Estado: </label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="state" id="estado1" value=1 @if($materia->state == 1) checked  @endif>
                                      <label class="form-check-label" for="estado1">
                                        Activa
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="state" id="estado0" value=0 @if($materia->state == 0) checked  @endif >
                                      <label class="form-check-label" for="estado0">
                                        Inactiva
                                      </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <a href="" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Actualizar Registro</button>
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
