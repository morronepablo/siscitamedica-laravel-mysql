@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Listado de pagos</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Pagos registrados</h3>
                            </div>
                            <a href="{{ route('admin.pagos.create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="bi bi-person-add"></i> Nuevo pago
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="usersTable" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Nro</th>
                                        <th scope="col">Paciente</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Fecha Pago</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($pagos as $pago)
                                        <tr>
                                            <td class="text-center">{{ $contador++ }}</td>
                                            <td>{{ $pago->paciente->apellidos }}, {{ $pago->paciente->nombres }} <b
                                                    class="float-right mr-2">DNI:
                                                    {{ $pago->paciente->dni }}</b></td>
                                            <td>{{ $pago->doctor->apellidos }}, {{ $pago->doctor->nombres }}</td>
                                            <td>
                                                <center>
                                                    {{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}
                                                </center>
                                            </td>
                                            <td class="text-right">$ {{ number_format($pago->monto, 2, ',', '.') }}</td>
                                            <td>{{ $pago->descripcion }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.pagos.show', $pago->id) }}" type="button"
                                                        class="btn btn-info btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Ver"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('admin.pagos.pdf', $pago->id) }}" type="button"
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Pdf" target="_blank"><i
                                                            class="bi bi-printer"></i></a>
                                                    <a href="{{ route('admin.pagos.edit', $pago->id) }}" type="button"
                                                        class="btn btn-success btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Editar"><i
                                                            class="bi bi-pencil"></i></a>
                                                    <a href="{{ route('admin.pagos.confirmDelete', $pago->id) }}"
                                                        type="button" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Eliminar"><i
                                                            class="bi bi-trash3"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <p>
                            <h4>Resumen total de pagos: <span class="text-purple">$
                                    {{ number_format($total_monto, 2, ',', '.') }}</span></h4>
                            </p>
                            <script>
                                $(function() {
                                    $('[data-toggle="tooltip"]').tooltip();
                                    $("#usersTable").DataTable({
                                        "pageLength": 10,
                                        "lengthMenu": [5, 10, 25, 50],
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Pagos",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                                            "infoFiltered": "(Filtrado de _MAX_ total Pagos)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Pagos",
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
                                                    text: '<button class="btn btn-primary btn-sm btn-block"><i class="bi bi-copy"></i> COPIAR</button>',
                                                    extend: 'copy',
                                                }, {
                                                    text: '<button class="btn btn-danger btn-sm btn-block"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>',
                                                    extend: 'pdf'
                                                }, {
                                                    text: '<button class="btn btn-info btn-sm btn-block"><i class="bi bi-filetype-csv"></i> CSV</button>',
                                                    extend: 'csv'
                                                }, {
                                                    text: '<button class="btn btn-success btn-sm btn-block"><i class="bi bi-file-earmark-excel-fill"></i> EXCEL</button>',
                                                    extend: 'excel'
                                                }, {
                                                    text: '<button class="btn btn-warning btn-sm btn-block"><i class="bi bi-printer-fill"></i> IMPRIMIR</button>',
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
