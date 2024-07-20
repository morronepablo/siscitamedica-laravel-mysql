@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="row ml-1 mt-4">
                        <h1><b>Bienvenido:</b> {{ Auth::user()->email }} / <b>Rol:</b>
                            {{ Auth::user()->roles->pluck('name')->first() }}
                        </h1>
                    </div>
                    <hr>
                    <br>

                    <div class="row">
                        <!-- Usuarios -->
                        @can('admin.usuarios.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalUsuarios }}</h3>
                                        <p>Usuarios</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas bi bi-people-fill"></i>
                                    </div>
                                    <a href="{{ route('admin.usuarios.index') }}" class="small-box-footer">Más información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Secretarias -->
                        @can('admin.secretarias.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $totalSecretarias }}</h3>
                                        <p>Secretarias</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-phone-alt"></i>
                                    </div>
                                    <a href="{{ route('admin.secretarias.index') }}" class="small-box-footer">Más información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Pacientes -->
                        @can('admin.pacientes.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $totalPacientes }}</h3>
                                        <p>Pacientes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-medkit"></i>
                                    </div>
                                    <a href="{{ route('admin.pacientes.index') }}" class="small-box-footer">Más información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Consultorios -->
                        @can('admin.consultorios.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $totalConsultorios }}</h3>
                                        <p>Consultorios</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-clinic-medical"></i>
                                    </div>
                                    <a href="{{ route('admin.consultorios.index') }}" class="small-box-footer">Más información
                                        <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Doctores -->
                        @can('admin.doctores.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $totalDoctores }}</h3>
                                        <p>Doctores</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-stethoscope"></i>
                                    </div>
                                    <a href="{{ route('admin.doctores.index') }}" class="small-box-footer">Más información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Horarios -->
                        @can('admin.horarios.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3>{{ $totalHorarios }}</h3>
                                        <p>Horarios</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-clock"></i>
                                    </div>
                                    <a href="{{ route('admin.horarios.index') }}" class="small-box-footer">Más información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Reservas -->
                        @can('admin.horarios.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalReservas }}</h3>
                                        <p>Reservas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-calendar"></i>
                                    </div>
                                    <a href="" class="small-box-footer"><i class="fas bi bi-calendar2-check"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Configuraciones -->
                        @can('admin.configuraciones.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3>{{ $totalConfiguraciones }}</h3>
                                        <p>Configuraciones</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-cog"></i>
                                    </div>
                                    <a href="{{ route('admin.configuraciones.index') }}" class="small-box-footer">Más
                                        información <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        <!-- Pagos -->
                        @can('admin.pagos.index')
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3>{{ $totalPagos }}</h3>
                                                <p>Pagos</p>
                                            </div>
                                            <div class="col-6 text-right">
                                                <h3>{{ number_format($totalCobrado, 2, ',', '.') }}</h3>
                                                <p>Total Cobrado</p>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('admin.pagos.index') }}" class="small-box-footer">Más
                                        información <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                    </div>

                    @can('cargaConsultorios')
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
                                                        url: "{{ url('/consultorios/') }}" + '/' + consultorio_id,
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-warning">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3 class="card-title">Calendario de reserva de citas médicas</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="float-right mt-1">
                                                    <label for="">Doctores</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" name="doctor_id" id="doctor_select">
                                                    <option value="">Seleccione su doctor</option>
                                                    @foreach ($doctores as $doctor)
                                                        <option value="{{ $doctor->id }}">
                                                            {{ $doctor->nombres }}, {{ $doctor->apellidos }} -
                                                            {{ $doctor->especialidad }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <script>
                                                    $('#doctor_select').on('change', function() {
                                                        var doctor_id = $(this).val();


                                                        var calendarEl = document.getElementById('calendar');
                                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                                            initialView: 'dayGridMonth',
                                                            locale: 'es',
                                                            events: []
                                                        });

                                                        if (doctor_id) {
                                                            $.ajax({
                                                                url: "{{ url('/cargar_reserva_doctores/') }}" + '/' + doctor_id,
                                                                type: 'GET',
                                                                dataType: 'json',
                                                                success: function(data) {
                                                                    calendar.addEventSource(data);
                                                                },
                                                                error: function() {
                                                                    console.log('Error');
                                                                }
                                                            });
                                                        } else {
                                                            $('#doctor_info').html('');
                                                        }

                                                        calendar.render();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Registrar cita médica
                                            </button>

                                            <a href="{{ route('admin.reservas', Auth::user()->id) }}"
                                                class="btn btn-success ml-2"><i class="bi bi-calendar2-check"></i>
                                                Ver las reservas</a>


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                    <div class="modal-content card card-primary">
                                                        <div class="modal-header card-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Reserva de cita
                                                                médica</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.events.create') }}" method="POST">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Doctor</label>
                                                                            <select name="doctor_id" id=""
                                                                                class="form-control">
                                                                                @foreach ($doctores as $doctor)
                                                                                    <option value="{{ $doctor->id }}">
                                                                                        {{ $doctor->nombres }},
                                                                                        {{ $doctor->apellidos }} -
                                                                                        {{ $doctor->especialidad }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Fecha de reserva</label>
                                                                            <input type="date" name="fecha_reserva"
                                                                                value="<?= date('Y-m-d') ?>"
                                                                                id="fecha_reserva" class="form-control">
                                                                            <script>
                                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                                    const fechaReservaInput = document.getElementById('fecha_reserva');

                                                                                    // Escuchar el evento de cambio en el campo fecha de reserva
                                                                                    fechaReservaInput.addEventListener('change', function() {
                                                                                        let selectedDate = this.value; //obtener la fecha seleccionada

                                                                                        // Obtener fecha actual en formato ISO (yyyy-mm-dd)
                                                                                        let today = new Date().toISOString().slice(0, 10);

                                                                                        // Verificar si la fecha seleccionada es anterior a la fecha actual
                                                                                        if (selectedDate < today) {
                                                                                            // Si es verdad establecer la fecha seleccionada en null
                                                                                            this.value = null;
                                                                                            alert('No se puede seleccionar una fecha pasada')
                                                                                        }
                                                                                    });
                                                                                });
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Hora de reserva</label>
                                                                            <input type="time" name="hora_reserva"
                                                                                id="hora_reserva" class="form-control">
                                                                            @error('hora_reserva')
                                                                                <small
                                                                                    class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                            @if ($message = Session::get('hora_reserva'))
                                                                                <script>
                                                                                    document.addEventListener('DOMContentLoaded', function() {
                                                                                        $('#exampleModal').modal('show');
                                                                                    })
                                                                                </script>
                                                                                <small
                                                                                    class="text-danger">{{ $message }}</small>
                                                                            @endif
                                                                            <script>
                                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                                    const horaReservaInput = document.getElementById('hora_reserva');

                                                                                    horaReservaInput.addEventListener('change', function() {
                                                                                        let selectedTime = this.value; //obtener la hora seleccionada

                                                                                        // Asegurar que solo se capture la parte de la hora
                                                                                        if (selectedTime) {
                                                                                            selectedTime = selectedTime.split(':'); // Dividir la cadena en hora y minutos
                                                                                            selectedTime = selectedTime[0] + ':00'; // Conservar solo la hora, ignorar los minutos
                                                                                            this.value = selectedTime; // Establecer la hora modificada en el campo de entrada
                                                                                        }

                                                                                        // Verificar si la hora seleccionada está fuera del rango permitido
                                                                                        if (selectedTime < '08:00' || selectedTime > '20:00') {
                                                                                            // Si es verdad establecer la hora seleccionada en null
                                                                                            this.value = null;
                                                                                            alert('Por favor, seleccione una hora entre las 08:00 y las 20:00.');
                                                                                        }
                                                                                    });
                                                                                });
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-outline-secondary btn-circle btn-lg"
                                                                data-dismiss="modal"><i
                                                                    class="fas fa-sign-out-alt"></i></button>
                                                            <button type="submit"
                                                                class="btn btn-outline-primary btn-circle btn-lg"><i
                                                                    class="fas fa-check"></i> Registrar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id='calendar'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan

                    @if ((Auth::check() && Auth::user()->doctor) || Auth::user()->name == 'Administrador')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3 class="card-title">
                                                    @if (Auth::user()->name == 'Administrador')
                                                        Reservas médicas
                                                    @else
                                                        Calendario de reservas
                                                    @endif
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="usersTable"
                                            class="table table-striped table-bordered table-hover table-sm">
                                            <thead class="thead-dark">
                                                <tr class="text-center">
                                                    <th scope="col">Nro</th>
                                                    <th scope="col">Usuario</th>
                                                    <th scope="col">Fecha Reserva</th>
                                                    <th scope="col">Hora Reserva</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $contador = 1;
                                                @endphp
                                                @foreach ($eventos as $evento)
                                                    @if (Auth::user()->name == 'Administrador')
                                                        <tr>
                                                            <td class="text-center">{{ $contador++ }}</td>
                                                            <td>{{ $evento->user->name }} -
                                                                {{ $evento->doctor->especialidad }}</td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @elseif(Auth::user()->doctor->id == $evento->doctor_id)
                                                        <tr>
                                                            <td class="text-center">{{ $contador++ }}</td>
                                                            <td>{{ $evento->user->name }}</td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @endif


                                                    {{-- @if (Auth::user()->name == 'Administrador')
                                                        <tr>
                                                            <td class="text-center">{{ $contador++ }}</td>
                                                            <td>{{ $evento->user->name }}</td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}
                                                                </center>
                                                            </td>
                                                    @endif --}}
                                                    {{-- @if (Auth::user()->doctor->id == $evento->doctor_id)
                                                        <tr>
                                                            <td class="text-center">{{ $contador++ }}</td>
                                                            <td>{{ $evento->user->name }}</td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    {{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}
                                                                </center>
                                                            </td>
                                                    @endif --}}
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
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
