@extends('.layouts.admin')



@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Libros</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Libros</li>
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
        text: "{{$message}}",
        icon: "success"
    });
</script>
@endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Lista de Libros</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">PHOTO</th>
                                <th scope="col">TITULO</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">SINOPSIS</th>
                                <th scope="col">AUTOR/A</th>
                                <th scope="col">MATERIA</th>
                                <th scope="col">EDITORIAL</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($libros as $libro)
                                <tr class="">
                                    <td scope="row">{{ $libro->id }}</td>
                                    <td><img src="{{ asset('storage').'/'.$libro->photo}}" alt="{{$libro->title}}" height="100px"></td>
                                    <td>{{ $libro->title }}</td>
                                    <td>
                                        @if ( $libro->state == 1)
                                            <div class="text-center btn-success btn-sm rounded-pill w-75 p-0">Activo</div>
                                        @else
                                        <div class="text-center btn-danger btn-sm rounded-pill w-75 p-0">Inactivo</div>
                                        @endif
                                    </td>
                                    <td>{!! $libro->sinopsis !!}</td>
                                    <td> 
                                        @foreach ($autores_libros as $autor_libro)
                                            @if ($autor_libro->book_id == $libro->id) 
                                                @foreach ($autores as $autor)
                                                    @if ($autor->id == $autor_libro->author_id) 
                                                        {{$autor->name }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$libro->materia->name}}
                                    </td>
                                    <td>
                                        {{$libro->editorial->name}}
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('bookreaders.show', $libro->id)}}" type="button" class="btn btn-info" title="Mostrar"><i class="bi bi-eye"></i> Consulta</a>
                                            {{ $prestamo = false}}
                                            @foreach ($libros_usuarios as $libro_usuario)
                                            
                                            @if (($libro_usuario->book_id == $libro->id) && ($libro_usuario->action == "PRESTAMO") && ($libro_usuario->user_id == Auth::user()->id))
                                            
                                            <form action="{{ route('bookreaders.destroy', $libro->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" title="Borrar"><i class="bi bi-upload"></i> Devolver</button><small style="visibility: hidden">{{ $prestamo = true}}</small>
                                                </form>
                                            @break
                                            
                                            @endif
                                            
                                            @endforeach
                                            @foreach ($libros_usuarios as $libro_usuario)
                                            
                                            @if (($libro_usuario->book_id != $libro->id) && ($libro_usuario->action != "PRESTAMO") && ($libro_usuario->user_id != Auth::user()->id &&($prestamo == false)))
                                            <a href="{{ route('bookreaders.edit', $libro->id,'/edit')}}" type="button" class="btn btn-success" title="Préstamo"><i class="bi bi-download"></i> Prestamo</a>
                                            @break
                                            
                                            @endif
                                            
                                            @endforeach
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <script>
                        $(function() {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de TOTAL entradas",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ entradas",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true,
                                "lengthChange": true,
                                "autoWidth": false,
                                "order": [[0, 'desc']],
                                buttons: [{
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: 'Copiar',
                                            extend: 'copy',
                                        }, {
                                            extend: 'pdf'
                                        }, {
                                            extend: 'csv'
                                        }, {
                                            extend: 'excel'
                                        }, {
                                            text: 'Imprimir',
                                            extend: 'print'
                                        }]
                                    },
                                    {
                                        extend: 'colvis',
                                        text: 'Vista de columnas',
                                        //collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                        /*
                        $(function() {
                            $("#example1").DataTable({
                                "responsive": true,
                                "lengthChange": true,
                                "autoWidth": false,
                                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                        */
                    </script>

                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
