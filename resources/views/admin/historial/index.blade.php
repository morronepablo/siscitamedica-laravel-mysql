@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Listado de Historiales</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Historiales registrados</h3>
                            </div>
                            <a href="{{ route('admin.historial.create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="bi bi-person-add"></i> Nuevo Historial
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="usersTable" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Nro</th>
                                        <th scope="col">Paciente</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Detalle</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($historiales as $historial)
                                        @if (Auth::user()->name == 'Administrador' || $historial->doctor_id == Auth::user()->doctor->id)
                                            <tr>
                                                <td class="text-center">{{ $contador++ }}</td>
                                                <td>{{ $historial->paciente->apellidos }},
                                                    {{ $historial->paciente->nombres }}
                                                </td>
                                                <td>
                                                    <center>
                                                        {{ \Carbon\Carbon::parse($historial->fecha_visita)->format('d/m/Y') }}
                                                    </center>
                                                </td>
                                                <td>{!! \Illuminate\Support\Str::limit($historial->detalle, 75, '...') !!}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.historial.show', $historial->id) }}"
                                                            type="button" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="bottom" title="Ver"><i
                                                                class="bi bi-eye"></i></a>
                                                        <a href="{{ route('admin.historial.pdf', $historial->id) }}"
                                                            type="button" class="btn btn-warning btn-sm"
                                                            data-toggle="tooltip" data-placement="bottom" title="Pdf"
                                                            target="_blank"><i class="bi bi-printer"></i></a>
                                                        <a href="{{ route('admin.historial.edit', $historial->id) }}"
                                                            type="button" class="btn btn-success btn-sm"
                                                            data-toggle="tooltip" data-placement="bottom" title="Editar"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <a href="{{ route('admin.historial.confirmDelete', $historial->id) }}"
                                                            type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            title="Eliminar"><i class="bi bi-trash3"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <script>
                                $(function() {
                                    $('[data-toggle="tooltip"]').tooltip();
                                    $("#usersTable").DataTable({
                                        "pageLength": 5,
                                        "lengthMenu": [5, 10, 25, 50],
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Historiales",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Historiales",
                                            "infoFiltered": "(Filtrado de _MAX_ total Historiales)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Historiales",
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
