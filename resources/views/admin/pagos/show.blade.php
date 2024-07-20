@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Pago del paciente: <span class="text-info">{{ $pago->paciente->apellidos }},
                {{ $pago->paciente->nombres }} - {{ number_format($pago->paciente->dni, 0, '', '.') }}</span></h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Datos registrados</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="paciente_id">Pacientes</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span> <!-- Icono de paciente -->
                                                </div>
                                            </div>
                                            <select name="paciente_id" id="paciente_id" class="form-control select2"
                                                disabled>
                                                <option value="{{ $pago->paciente->id }}">
                                                    {{ $pago->paciente->apellidos }},
                                                    {{ $pago->paciente->nombres }} - {{ $pago->paciente->dni }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <style>
                                        .select2-container {
                                            width: 100% !important;
                                        }

                                        .select2-container .select2-selection--single {
                                            height: 38px !important;
                                            border-top-left-radius: 0;
                                            border-bottom-left-radius: 0;
                                        }

                                        .select2-selection__rendered {
                                            line-height: 38px !important;
                                        }

                                        .select2-selection {
                                            height: 38px !important;
                                            display: flex;
                                            align-items: center;
                                        }

                                        .select2-selection__arrow {
                                            height: 38px !important;
                                        }

                                        .input-group-prepend .input-group-text {
                                            height: 38px;
                                            border-top-right-radius: 0;
                                            border-bottom-right-radius: 0;
                                        }

                                        .input-group {
                                            flex-wrap: nowrap;
                                        }
                                    </style>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doctor_id">Doctores</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fas fa-stethoscope"></span> <!-- Icono de doctor -->
                                                </div>
                                            </div>
                                            <select name="doctor_id" id="doctor_id" class="form-control select2" disabled>
                                                <option value="{{ $pago->doctor->id }}">
                                                    {{ $pago->doctor->apellidos }},
                                                    {{ $pago->doctor->nombres }} - {{ $pago->doctor->especialidad }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <style>
                                        .select2-container {
                                            width: 100% !important;
                                        }

                                        .select2-container .select2-selection--single {
                                            height: 38px !important;
                                            border-top-left-radius: 0;
                                            border-bottom-left-radius: 0;
                                        }

                                        .select2-selection__rendered {
                                            line-height: 38px !important;
                                        }

                                        .select2-selection {
                                            height: 38px !important;
                                            display: flex;
                                            align-items: center;
                                        }

                                        .select2-selection__arrow {
                                            height: 38px !important;
                                        }

                                        .input-group-prepend .input-group-text {
                                            height: 38px;
                                            border-top-right-radius: 0;
                                            border-bottom-right-radius: 0;
                                        }

                                        .input-group {
                                            flex-wrap: nowrap;
                                        }
                                    </style>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha Pago</label>
                                        <input type="date" name="fecha_pago" value="{{ $pago->fecha_pago }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="monto">Monto</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-dollar-sign"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="monto"
                                                value="{{ $pago->monto }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-keyboard"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="descripcion"
                                                value="{{ $pago->descripcion }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <a href="{{ route('admin.pagos.index') }}"
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
    </div>
@endsection
