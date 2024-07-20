@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Listado de Configuraciones</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Configuraciones registradas</h3>
                            </div>
                            <a href="{{ route('admin.configuraciones.create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="bi bi-person-add"></i> Nueva Configuración
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="usersTable" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Nro</th>
                                        <th scope="col">Hospital/Clínica</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Email</th>
                                        {{-- <th scope="col">Logo</th> --}}
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($configuraciones as $configuracion)
                                        <tr>
                                            <td class="text-center">{{ $contador++ }}</td>
                                            <td>{{ $configuracion->nombre }}</td>
                                            <td>{{ $configuracion->direccion }}</td>
                                            <td>{{ $configuracion->telefono }}</td>
                                            <td>{{ $configuracion->email }}</td>
                                            {{-- <td>{{ $configuracion->logo }}</td> --}}
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.configuraciones.show', $configuracion->id) }}"
                                                        type="button" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Ver"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('admin.configuraciones.edit', $configuracion->id) }}"
                                                        type="button" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Editar"><i
                                                            class="bi bi-pencil"></i></a>
                                                    <a href="{{ route('admin.configuraciones.confirmDelete', $configuracion->id) }}"
                                                        type="button" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Eliminar"><i
                                                            class="bi bi-trash3"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <script>
                                $(function() {
                                    $('[data-toggle="tooltip"]').tooltip();
                                    $("#usersTable").DataTable({
                                        "pageLength": 10,
                                        "lengthMenu": [5, 10, 25, 50],
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Configuraciones",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Configuraciones",
                                            "infoFiltered": "(Filtrado de _MAX_ total Configuraciones)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Configuraciones",
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
                                        "order": [
                                            [0, 'desc']
                                        ], // Ordenar por la primera columna de forma descendente
                                        "columnDefs": [{
                                            "width": "5%",
                                            "targets": 0
                                        }, ],
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
                                                text: 'Visor de columnas',
                                                collectionLayout: 'fixed three-column'
                                            }
                                        ],
                                    }).buttons().container().appendTo('#usersTable_wrapper .col-md-6:eq(0)');

                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
