@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Datos del horario</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Datos Registrados</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dia">Día</label>
                                        <select class="form-control" name="dia" disabled>
                                            <option value="Lunes" {{ $horario->dia == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                                            <option value="Martes" {{ $horario->dia == 'Martes' ? 'selected' : '' }}>Martes</option>
                                            <option value="Miercoles" {{ $horario->dia == 'Miercoles' ? 'selected' : '' }}>Miercoles</option>
                                            <option value="Jueves" {{ $horario->dia == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                                            <option value="Viernes" {{ $horario->dia == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                                            <option value="Sabado" {{ $horario->dia == 'Sabado' ? 'selected' : '' }}>Sabado</option>
                                            <option value="Domingo" {{ $horario->dia == 'Domingo' ? 'selected' : '' }}>Domingo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hora_inicio">Hora Inicio</label>
                                        <input type="time"
                                            class="form-control"
                                            name="hora_inicio" value="{{ $horario->hora_inicio }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hora_fin">Hora Fin</label>
                                        <input type="time"
                                            class="form-control"
                                            name="hora_fin" value="{{ $horario->hora_fin }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_id">Doctores</label>
                                        <select class="form-control" name="doctor_id" disabled>
                                            @foreach ($doctores as $doctor)
                                                <option value="{{ $horario->doctor_id }}">
                                                    {{ $horario->doctor->nombres }}, {{ $horario->doctor->apellidos }} - {{ $horario->doctor->especialidad }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="consultorio_id">Consultorios</label>
                                        <select class="form-control" name="consultorio_id" disabled>
                                            @foreach ($consultorios as $consultorio)
                                                <option value="{{ $horario->consultorio_id }}">
                                                    {{ $horario->consultorio->nombre }} - {{  $horario->consultorio->ubicacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <a href="{{ route('admin.horarios.index') }}"
                                                class="btn btn-secondary float-right"><i class="bi bi-reply"></i>
                                                Volver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
