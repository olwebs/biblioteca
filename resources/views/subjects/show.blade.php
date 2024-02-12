@extends('.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ficha de Materia</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('subjects.index') }}">Materias</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('subjects.create') }}">Nueva Materia</a></li>
                        <li class="breadcrumb-item active">Editorial</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if ($message = Session::get('mensaje'))
        <script>
            Swal.fire({
                title: "Buen trabajo!",
                text: "{{ $message }}",
                icon: "success"
            });
        </script>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Datos Nueva Materia</h3>
                </div>
                <div class="card-body">
                    {{--
                  @foreach ($errors->all() as $error)
                      <li class="alert alert-danger">{{$error}}</li>
                  @endforeach
                 --}}

                    <div class="row">
                        @csrf
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre: </label> <input type="text" name="name"
                                    value="{{ $materia->name }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Estado: </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="state"
                                        @if ($materia->state == 1) checked @endif disabled>
                                    <label class="form-check-label" for="estado1">
                                        Activa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="state"
                                        @if ($materia->state == 0) checked @endif disabled>
                                    <label class="form-check-label" for="estado0">
                                        Inactiva
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('subjects.edit', $materia->id,'/edit')}}" class="btn btn-primary">Editar Registro</a>
                        </div>


                    </div>

                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
