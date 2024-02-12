@extends('.layouts.admin')



@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Autores/as</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Autores/as</li>
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
                    <h3 class="card-title">Lista de Autores/as</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool">
                            <a href="{{ route('authors.create') }}" class="btn btn-primary"><i class="bi bi-file-plus"></i>
                                Registrar Nuevo/a</a>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">Creado</th>
                                <th scope="col">Actualizado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($autores as $autor)
                                <tr class="">
                                    <td scope="row">{{ $autor->id }}</td>
                                    <td>{{ $autor->name }}</td>
                                    <td>
                                        @if ( $autor->state == 1)
                                            <div class="text-center btn-success btn-sm rounded-pill w-75 p-0">Activo/a</div>
                                        @else
                                        <div class="text-center btn-danger btn-sm rounded-pill w-75 p-0">Inactivo/a</div>
                                        @endif
                                    </td>
                                    <td>{{ $autor->created_at }}</td>
                                    <td>{{ $autor->updated_at }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('authors.show', $autor->id)}}" type="button" class="btn btn-info" title="Mostrar"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('authors.edit', $autor->id,'/edit')}}" type="button" class="btn btn-success" title="Editar"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('authors.destroy', $autor->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" title="Borrar" onclick="return confirm('Confirme que desea borrar el registro');"><i class="bi bi-trash"></i></button>
                                            </form>
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
