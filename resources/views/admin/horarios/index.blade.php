@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Listado de Horarios</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Horarios registrados</h3>
                            </div>
                            <a href="{{ route('admin.horarios.create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="bi bi-person-add"></i> Nuevo Horario
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="usersTable" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Nro</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Especialidad</th>
                                        <th scope="col">Consultorio</th>
                                        <th scope="col">Dia atención</th>
                                        <th scope="col">Desde</th>
                                        <th scope="col">Hasta</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($horarios as $horario)
                                        <tr>
                                            <td class="text-center">{{ $contador++ }}</td>
                                            <td>{{ $horario->doctor->nombres }}, {{ $horario->doctor->apellidos }}</td>
                                            <td>{{ $horario->doctor->especialidad }}</td>
                                            <td>{{ $horario->consultorio->nombre }} - {{ $horario->consultorio->ubicacion }}
                                            </td>
                                            <td>{{ $horario->dia }}</td>
                                            <td>{{ $horario->hora_inicio }}</td>
                                            <td>{{ $horario->hora_fin }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.horarios.show', $horario->id) }}"
                                                        type="button" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Ver"><i class="bi bi-eye"></i></a>
                                                    <a href="{{ route('admin.horarios.edit', $horario->id) }}"
                                                        type="button" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                        data-placement="bottom" title="Editar"><i
                                                            class="bi bi-pencil"></i></a>
                                                    <a href="{{ route('admin.horarios.confirmDelete', $horario->id) }}"
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
                                        "pageLength": 5,
                                        "lengthMenu": [5, 10, 25, 50],
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                            "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Horarios",
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
                                        }],
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="card-title">Calendario de atención de doctores</h3>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right mt-1">
                                        <label for="consultorio_id">Consultorios</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="consultorio_id" id="consultorio_select">
                                        <option value="">Seleccione un consultorio</option>
                                        @foreach ($consultorios as $consultorio)
                                            <option value="{{ $consultorio->id }}">
                                                {{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <script>
                                $('#consultorio_select').on('change', function() {
                                    var consultorio_id = $(this).val();

                                    if (consultorio_id) {
                                        $.ajax({
                                            url: "{{ url('/admin/horarios/consultorios/') }}" + '/' + consultorio_id,
                                            type: 'GET',
                                            success: function(data) {
                                                $('#consultorio_info').html(data);
                                            },
                                            error: function() {
                                                console.log('Error');
                                            }
                                        });
                                    } else {
                                        $('#consultorio_info').html('');
                                    }
                                });
                            </script>
                            <div id="consultorio_info">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
