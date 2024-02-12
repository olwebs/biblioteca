@extends('.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Página Inicio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Página Inicio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $num_usuarios}}</h3>
                            <h4>Usuarios/as</h4>
                        </div>
                        <div class="icon">
                          <i class="nav-icon bi bi-person-fill"></i>
                        </div>
                        <a href="{{ route('authors.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $num_autores}}</h3>
                            <h4>Autores/as</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon bi bi-person-bounding-box"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $num_libros}}</h3>
                            <h4>Libros</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon bi bi-book-fill"></i>
                        </div>
                        <a href="{{ route('books.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $num_materias}}</h3>
                            <h4>Materias</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon bi bi-tags"></i>
                        </div>
                        <a href="{{ route('subjects.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $num_editoriales}}</h3>
                            <h4>Editoriales</h4>
                        </div>
                        <div class="icon">
                          <i class="nav-icon bi bi-building"></i>
                        </div>
                        <a href="{{ route('editorials.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $num_prestamos}}</h3>
                            <h4>Préstamos</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon bi bi-briefcase-fill"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $num_consultas}}</h3>
                            <h4>Consultas</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon bi bi-table"></i>
                        </div>
                        <a href="{{ route('books.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $num_lectores}}</h3>
                            <h4>Lectores</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon bi bi-person-circle"></i>
                        </div>
                        <a href="{{ route('subjects.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
