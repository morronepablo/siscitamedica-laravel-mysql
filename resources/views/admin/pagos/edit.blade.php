@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Pago del paciente: <span class="text-success">{{ $pago->paciente->apellidos }},
                {{ $pago->paciente->nombres }} - {{ number_format($pago->paciente->dni, 0, '', '.') }}</span>
        </h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Llene los datos</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pagos.update', $pago->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paciente_id">Pacientes</label> <b class="text-danger">*</b>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span> <!-- Icono de paciente -->
                                                    </div>
                                                </div>
                                                <select name="paciente_id" id="paciente_id" class="form-control select2"
                                                    required>
                                                    <option></option>
                                                    @foreach ($pacientes as $paciente)
                                                        <option value="{{ $paciente->id }}"
                                                            {{ old('paciente_id', $pago->paciente_id) == $paciente->id ? 'selected' : '' }}>
                                                            {{ $paciente->apellidos }},
                                                            {{ $paciente->nombres }} - {{ $paciente->dni }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('paciente_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
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
                                        <script>
                                            $('#paciente_id').select2({
                                                placeholder: 'Selecciona un paciente',
                                                allowClear: true,
                                                language: 'es'
                                            });
                                        </script>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doctor_id">Doctores</label> <b class="text-danger">*</b>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-stethoscope"></span> <!-- Icono de doctor -->
                                                    </div>
                                                </div>
                                                <select name="doctor_id" id="doctor_id" class="form-control select2"
                                                    required>
                                                    <option></option>
                                                    @foreach ($doctores as $doctor)
                                                        <option value="{{ $doctor->id }}"
                                                            {{ old('doctor_id', $pago->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                                            {{ $doctor->apellidos }},
                                                            {{ $doctor->nombres }} - {{ $doctor->especialidad }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('doctor_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
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
                                        <script>
                                            $('#doctor_id').select2({
                                                placeholder: 'Selecciona un doctor',
                                                allowClear: true,
                                                language: 'es'
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha Pago</label> <b class="text-danger">*</b>
                                            <input type="date" name="fecha_pago" value="{{ $pago->fecha_pago }}"
                                                class="form-control">
                                            @error('fecha_visita')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="monto">Monto</label> <b class="text-danger">*</b>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-dollar-sign"></span>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('monto') ? 'is-invalid' : '' }}"
                                                    name="monto" value="{{ old('monto', $pago->monto) }}" required
                                                    autofocus>
                                                @error('monto')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label> <b class="text-danger">*</b>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-keyboard"></span>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control  {{ $errors->has('descripcion') ? 'is-invalid' : '' }}"
                                                    name="descripcion" value="{{ old('descripcion', $pago->descripcion) }}"
                                                    required autofocus>
                                                @error('descripcion')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.pagos.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="bi bi-floppy"></i> Actualizar pago</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
