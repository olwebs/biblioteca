@extends('.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ficha de Usuario/a</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios/as</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.create') }}">Nuevo/a Usuario/a</a></li>
                        <li class="breadcrumb-item active">Usuario/a</li>
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
                    <h3 class="card-title">Datos Nuevo/a Usuario/a</h3>
                </div>
                <div class="card-body">

                    

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Fecha de Admisión:</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="date_admision" value="{{ $usuario->date_admission }}" disabled>
                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            
                                <label for="" class="col-md-4 col-form-label text-md-end">Estado: </label>
                            <div class="col-md-6">
                                <div class="px-5">
                                    <input class="form-check-input  my-3" type="radio" name="state" id="estado1" value=1 {{ $usuario->state == 1 ? 'checked' : "" }} @disabled(true)>
                                    <label class="col-md-4 col-form-label text-md-end" for="estado1">
                                        Activo/a
                                    </label>
                                
                                    <input class="form-check-input my-3" type="radio" name="state" id="estado0" value=0 {{ $usuario->state == 0 ? 'checked' : "" }} @disabled(true)>
                                    <label class="col-md-4 col-form-label text-md-end" for="estado0">
                                        Inactivo/a
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row  my-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a>
                                <a href="{{ route('users.edit', $usuario->id,'/edit')}}" class="btn btn-primary">Editar Registro</a>
                            </div>
                        </div>
                    
                    

                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
