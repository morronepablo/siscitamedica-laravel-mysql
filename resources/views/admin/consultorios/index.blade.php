@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Listado de Consultorios</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Consultorios registrados</h3>
                            </div>
                            <a href="{{ route('admin.consultorios.create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="bi bi-person-add"></i> Nuevo Consultorio
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="usersTable" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Nro</th>
                                        <th scope="col">Consultorio</th>
                                        <th scope="col">Ubicación</th>
                                        <th scope="col">Capacidad</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Especialidad</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($consultorios as $consultorio)
                                        <tr>
                                            <td class="text-center">{{ $contador++ }}</td>
                                            <td>{{ $consultorio->nombre }}</td>
                                            <td>{{ $consultorio->ubicacion }}</td>
                                            <td>{{ $consultorio->capacidad }}</td>
                                            <td>{{ $consultorio->telefono }}</td>
                                            <td>{{ $consultorio->especialidad }}</td>
                                            <td class="text-center">{{ $consultorio->estado }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.consultorios.show', $consultorio->id) }}"
                                                        type="button" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Ver"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('admin.consultorios.edit', $consultorio->id) }}"
                                                        type="button" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Editar"><i
                                                            class="bi bi-pencil"></i></a>
                                                    <a href="{{ route('admin.consultorios.confirmDelete', $consultorio->id) }}"
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
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Consultorios",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Consultorios",
                                            "infoFiltered": "(Filtrado de _MAX_ total Consultorios)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Consultorios",
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
                                            },
                                            {
                                                "width": "7%",
                                                "targets": 6,
                                                "render": function(data, type, row) {
                                                    let classColor = 'bg-info';
                                                    let generoTexto = '';
                                                    if (data == 'ACTIVO') {
                                                        classColor = 'bg-info';
                                                        generoTexto = 'Activo';
                                                    } else if (data == 'INACTIVO') {
                                                        classColor = 'bg-danger';
                                                        generoTexto = 'Inactivo';
                                                    }
                                                    return `<span class='badge text-white ${classColor}'>${generoTexto}</span>`;
                                                }
                                            },
                                        ],
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
