@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Registro de un nuevo horario</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Llene los datos</h3>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-3">
                                <div style="width: 95%;">
                                    <form action="{{ route('admin.horarios.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="consultorio_id">Consultorios</label> <b
                                                        class="text-danger">*</b>
                                                    <select
                                                        class="form-control {{ $errors->has('consultorio_id') ? 'is-invalid' : '' }}"
                                                        name="consultorio_id" id="consultorio_select" required>
                                                        <option value="">Seleccione un consultorio</option>
                                                        @foreach ($consultorios as $consultorio)
                                                            <option value="{{ $consultorio->id }}"
                                                                {{ old('consultorio_id') == $consultorio->id ? 'selected' : '' }}>
                                                                {{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('consultorio_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
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
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="doctor_id">Doctores</label> <b class="text-danger">*</b>
                                                    <select
                                                        class="form-control {{ $errors->has('doctor_id') ? 'is-invalid' : '' }}"
                                                        name="doctor_id" required>
                                                        @foreach ($doctores as $doctor)
                                                            <option value="{{ $doctor->id }}"
                                                                {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                                {{ $doctor->nombres }}, {{ $doctor->apellidos }} -
                                                                {{ $doctor->especialidad }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('doctor_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="dia">Día</label> <b class="text-danger">*</b>
                                                    <select
                                                        class="form-control {{ $errors->has('dia') ? 'is-invalid' : '' }}"
                                                        name="dia" required>
                                                        <option value="">Seleccionar</option>
                                                        <option value="Lunes"
                                                            {{ old('dia') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                                                        <option value="Martes"
                                                            {{ old('dia') == 'Martes' ? 'selected' : '' }}>Martes</option>
                                                        <option value="Miercoles"
                                                            {{ old('dia') == 'Miercoles' ? 'selected' : '' }}>Miercoles
                                                        </option>
                                                        <option value="Jueves"
                                                            {{ old('dia') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                                                        <option value="Viernes"
                                                            {{ old('dia') == 'Viernes' ? 'selected' : '' }}>Viernes
                                                        </option>
                                                        <option value="Sabado"
                                                            {{ old('dia') == 'Sabado' ? 'selected' : '' }}>Sabado</option>
                                                        <option value="Domingo"
                                                            {{ old('dia') == 'Domingo' ? 'selected' : '' }}>Domingo
                                                        </option>
                                                    </select>
                                                    @error('dia')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="hora_inicio">Hora Inicio</label> <b
                                                        class="text-danger">*</b>
                                                    <input type="time"
                                                        class="form-control {{ $errors->has('hora_inicio') ? 'is-invalid' : '' }}"
                                                        name="hora_inicio" value="{{ old('hora_inicio') }}" required>
                                                    @error('hora_inicio')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="hora_fin">Hora Fin</label> <b class="text-danger">*</b>
                                                    <input type="time"
                                                        class="form-control {{ $errors->has('hora_fin') ? 'is-invalid' : '' }}"
                                                        name="hora_fin" value="{{ old('hora_fin') }}" required>
                                                    @error('hora_fin')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('admin.horarios.index') }}"
                                                        class="btn btn-secondary"><i class="bi bi-x-circle"></i>
                                                        Cancelar</a>
                                                    <button type="submit" class="btn btn-primary float-right"><i
                                                            class="bi bi-floppy"></i> Registrar horario</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-9 card">
                                <div id="consultorio_info">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
