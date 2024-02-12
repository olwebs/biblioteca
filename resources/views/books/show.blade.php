@extends('.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ficha de Autor/a</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Libros</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('books.create') }}">Nuevo Libro</a></li>
                        <li class="breadcrumb-item active">Autor</li>
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
                    <h3 class="card-title">Datos Nuevo Libro</h3>
                </div>
                <div class="card-body">
     
                    <div class="row">
                        
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Título:* </label> <input type="text" name="title"
                                            value="{{ $libro->title }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Editorial:* </label>
                                        <select name="editorial_id" class="form-control" disabled>
                                            <option value="{{ $libro->editorial_id }}" selected>{{$libro->editorial->name}}</option>
                                        </select>
                                        @error('editorial_id')
                                            <small class="text-danger">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Autor:* </label>
                                        <select name="author_id" class="form-control" disabled>
                                         @foreach ($autores_libros as $autor_libro)
                                            @if ($autor_libro->book_id == $libro->id) 
                                                @foreach ($autores as $autor)
                                                    @if ($autor->id == $autor_libro->author_id) 
                                                        <option value="{{ $autor->id }}" selected>{{$autor->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                            
                                        </select>
                                        @error('author_id')
                                            <small class="text-danger">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Materia:* </label>
                                        <select name="subject_id" class="form-control" disabled>
                                            <option value="{{ $libro->subject_id }}" selected>{{$libro->materia->name}}</option>
                                        </select>
                                        @error('subject_id')
                                            <small class="text-danger">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fotografía: </label>
                                
                            </div>
                            <div class="form-group text-center">
                                @if ($libro->photo != "")
                                <img src="{{ asset('storage').'/'.$libro->photo}}" alt="{{$libro->title}}" height="250px">
                                @else
                                <img src="{{ asset('storage').'/icon-libro.png'}}" alt="libro" height="250px">
                                @endif
                                
                            </div>
                        </div>

                    </div>





                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sinopsis: </label>
                                <div  class="border border-secondary rounded p-3 mb-2 bg-light text-dark " style="overflow-y:scroll;height:200px">
                                {!! $libro->sinopsis !!}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Observaciones: </label>
                                <textarea name="observations" class="form-control" rows="7" disabled>{{ $libro->observations }}</textarea>
                            </div>

                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="">Estado: </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="state" id="estado1" value=1
                                        @if ($libro->state == 1) checked @endif disabled>
                                    <label class="form-check-label" for="estado1">
                                        Activo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="state" id="estado0" value=0
                                        @if ($libro->state == 0) checked @endif disabled>
                                    <label class="form-check-label" for="estado0">
                                        Inactivo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                        
                        <div class="col-md-4 text-right">
                            <a href="{{ route('books.edit', $libro->id,'/edit')}}" class="btn btn-primary">Editar Registro</a>
                        </div>


                    </div>

                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
