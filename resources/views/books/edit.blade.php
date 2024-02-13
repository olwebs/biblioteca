@extends('.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Libro</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Libros</a></li>
                        <li class="breadcrumb-item active">Editar Libro</li>
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
                    <h3 class="card-title">Datos Editar Libro</h3>
                </div>
                <div class="card-body">
                    {{--
                  @foreach ($errors->all() as $error)
                      <li class="alert alert-danger">{{$error}}</li>
                  @endforeach
                 --}}
                    <form action="{{ route('books.update', $libro->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            @method('put')

                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Título:* </label> <input type="text" name="title"
                                                value="{{ $libro->title }}" class="form-control">
                                            @error('title')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Editorial:* </label>
                                            <select name="editorial_id" class="form-control">
                                                <option value="{{ $libro->editorial_id }}" selected>
                                                    {{ $libro->editorial->name }}</option>
                                                @foreach ($editoriales as $editorial)
                                                    <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                                                @endforeach

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
                                            <label for="">Autor/a:* </label>
                                            <select name="author_id" class="form-control">
                                                @foreach ($autores_libros as $autor_libro)
                                                    @if ($autor_libro->book_id == $libro->id)
                                                        @foreach ($autores as $autor)
                                                            @if ($autor->id == $autor_libro->author_id)
                                                                
                                                                <option value="{{ $autor->id }}" selected>
                                                                    {{ $autor->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    
                                                    @endif
                                                        
                                                @endforeach
                                                @foreach ($autores as $autor)   
                                                <option value="{{ $autor->id }}" >
                                                    {{ $autor->name }}</option>
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
                                            <select name="subject_id" class="form-control">
                                                <option value="{{ $libro->subject_id }}" selected>
                                                    {{ $libro->materia->name }}</option>

                                                @foreach ($materias as $materia)
                                                    <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                                                @endforeach
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
                                    <input type="file" id="file" name="photo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <output id="list">
                                        @if ($libro->photo != '')
                                            <img src="{{ asset('storage') . '/' . $libro->photo }}" alt="{{ $libro->title }}"
                                                height="250px">
                                        @else
                                            <img src="{{ asset('storage') . '/icon-libro.png' }}" alt="libro"
                                                height="250px">
                                        @endif
                                    </output>
                                    <script>
                                        function archivo(evt) {
                                            var files = evt.target.files;
                                            //obtenemos la imagen del campo "file".
                                            for (var i = 0, f; f = files[i]; i++) {
                                                //solo admitimos imagenes.
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }
                                                var reader = new FileReader();
                                                reader.onload = (function(theFile) {
                                                    return function(e) {
                                                        //insertamos la imagen
                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e
                                                            .target.result, '"width="100%" title="', escape(theFile.name), '"/>'
                                                        ].join('');
                                                    };
                                                })(f);
                                                reader.readAsDataURL(f);
                                            }

                                        }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                    </script>
                                </div>
                            </div>

                        </div>





                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sinopsis: </label>
                                    <textarea name="sinopsis" class="form-control" rows="7">{{ $libro->sinopsis }}</textarea>
                                    <script>
                                        CKEDITOR.replace('sinopsis');
                                    </script>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Observaciones: </label>
                                    <textarea name="observations" class="form-control" rows="7">{{ $libro->observations }}</textarea>
                                </div>

                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="">Estado: </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" id="estado1" value=1
                                            @if ($libro->state == 1) checked @endif>
                                        <label class="form-check-label" for="estado1">
                                            Activo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" id="estado0"
                                            value=0 @if ($libro->state == 0) checked @endif>
                                        <label class="form-check-label" for="estado0">
                                            Inactivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar Registro</button>
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
