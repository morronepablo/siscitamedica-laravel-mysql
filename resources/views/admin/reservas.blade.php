@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Listado de Reservas</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Reservas registradas</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="usersTable" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">Nro</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Especialidad</th>
                                        <th scope="col">Fecha Reserva</th>
                                        <th scope="col">Hora Reserva</th>
                                        <th scope="col">Fecha Hora Registro</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($eventos as $evento)
                                        <tr>
                                            <td class="text-center">{{ $contador++ }}</td>
                                            <td>{{ $evento->doctor->nombres }}, {{ $evento->doctor->apellidos }}</td>
                                            <td>{{ $evento->doctor->especialidad }}</td>
                                            <td>
                                                <center>{{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                                                </center>
                                            </td>
                                            <td>
                                                <center>{{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</center>
                                            </td>
                                            <td>
                                                <center>
                                                    {{ \Carbon\Carbon::parse($evento->created_at)->format('d/m/Y H:i') }}
                                                </center>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('admin.events.destroy', $evento->id) }}"
                                                        method="POST" id="formulario{{ $evento->id }}"
                                                        onclick="preguntar{{ $evento->id }} (event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                    </form>
                                                    <script>
                                                        function preguntar{{ $evento->id }}(event) {
                                                            event.preventDefault();
                                                            Swal.fire({
                                                                title: "Está seguro que querer eliminar esta reserva ?",
                                                                text: "Si elimina este registro, otro usuario podrá reservar este mismo horario.",
                                                                icon: "question",
                                                                showDenyButton: true,
                                                                showCancelButton: false,
                                                                confirmButtonText: "Eliminar",
                                                                denyButtonText: `Cancelar`
                                                            }).then((result) => {
                                                                /* Read more about isConfirmed, isDenied below */
                                                                if (result.isConfirmed) {
                                                                    var form = $('#formulario{{ $evento->id }}');
                                                                    form.submit();
                                                                } else if (result.isDenied) {
                                                                    Swal.fire("La reserva no ha sida eliminada", "", "info");
                                                                }
                                                            });
                                                            // return confirm("¿Estás seguro de que deseas eliminar este evento? " + id);
                                                        }
                                                    </script>
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
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                            "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Reservas",
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
        </div>
    </div>
@endsection
