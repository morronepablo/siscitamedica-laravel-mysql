@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Listado de Pacientes</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Pacientes registradas</h3>
                            </div>
                            <a href="{{ route('admin.pacientes.create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="bi bi-person-add"></i> Nuevo Paciente
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="usersTable" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Nro</th>
                                        <th scope="col">Nombres y Apellidos</th>
                                        <th scope="col">D.N.I.</th>
                                        <th scope="col">Nro Seguro</th>
                                        <th scope="col">Fecha Nacimiento</th>
                                        <th scope="col">Genero</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td class="text-center">{{ $contador++ }}</td>
                                            <td>{{ $paciente->nombres }} {{ $paciente->apellidos }}</td>
                                            <td>{{ number_format($paciente->dni, 0, '', '.') }}</td>
                                            <td>{{ $paciente->nro_seguro }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}
                                            </td>
                                            <td class="text-center">{{ $paciente->genero }}</td>
                                            <td>{{ $paciente->celular }}</td>
                                            <td>{{ $paciente->correo }}</td>
                                            <td>{{ $paciente->direccion }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.pacientes.show', $paciente->id) }}"
                                                        type="button" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Ver"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('admin.pacientes.edit', $paciente->id) }}"
                                                        type="button" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Editar"><i
                                                            class="bi bi-pencil"></i></a>
                                                    <a href="{{ route('admin.pacientes.confirmDelete', $paciente->id) }}"
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
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                                            "infoFiltered": "(Filtrado de _MAX_ total Pacientes)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Pacientes",
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
                                                "targets": 5,
                                                "render": function(data, type, row) {
                                                    let classColor = 'bg-info';
                                                    let generoTexto = '';
                                                    if (data == 'M') {
                                                        classColor = 'bg-info';
                                                        generoTexto = 'Masculino';
                                                    } else if (data == 'F') {
                                                        classColor = 'bg-danger';
                                                        generoTexto = 'Femenino';
                                                    }
                                                    return `<span class='badge text-white ${classColor}'>${generoTexto}</span>`;
                                                }
                                            },
                                            {
                                                "width": "5%",
                                                "targets": 6
                                            },
                                            {
                                                "width": "15%",
                                                "targets": 7
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
