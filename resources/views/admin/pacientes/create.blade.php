@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Registro de un nuevo paciente</h1>
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
                        <div class="card-body">
                            <form action="{{ route('admin.pacientes.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombres">Nombres</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}"
                                                name="nombres" value="{{ old('nombres') }}" required>
                                            @error('nombres')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}"
                                                name="apellidos" value="{{ old('apellidos') }}" required>
                                            @error('apellidos')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dni">D.N.I.</label> <b class="text-danger">*</b>
                                            <input type="number"
                                                class="form-control {{ $errors->has('dni') ? 'is-invalid' : '' }}"
                                                name="dni" value="{{ old('dni') }}" required>
                                            @error('dni')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nro_seguro">Nro. Seguro</label>
                                            <input type="number"
                                                class="form-control {{ $errors->has('nro_seguro') ? 'is-invalid' : '' }}"
                                                name="nro_seguro" value="{{ old('nro_seguro') }}">
                                            @error('nro_seguro')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha Nacimiento</label> <b class="text-danger">*</b>
                                            <input type="date"
                                                class="form-control {{ $errors->has('fecha_nacimiento') ? 'is-invalid' : '' }}"
                                                name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                                            @error('fecha_nacimiento')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="genero">Género</label> <b class="text-danger">*</b>
                                            <select class="form-control {{ $errors->has('genero') ? 'is-invalid' : '' }}" name="genero" required>
                                                <option value="">Seleccionar</option>
                                                <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino</option>
                                                <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                                            </select>
                                            @error('genero')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="celular">Celular</label> <b class="text-danger">*</b>
                                            <input type="number"
                                                class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                                                name="celular" value="{{ old('celular') }}" required>
                                            @error('celular')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="correo">Correo</label> <b class="text-danger">*</b>
                                            <input type="email"
                                                class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}"
                                                name="correo" value="{{ old('correo') }}" required>
                                            @error('correo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}"
                                                name="direccion" value="{{ old('direccion') }}" required>
                                            @error('direccion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="grupo_sanguineo">Grupo Sanguineo</label>
                                            <select class="form-control {{ $errors->has('grupo_sanguineo') ? 'is-invalid' : '' }}" name="grupo_sanguineo">
                                                <option value="">Seleccionar</option>
                                                <option value="A+" {{ old('grupo_sanguineo') == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option value="A-" {{ old('grupo_sanguineo') == 'A-' ? 'selected' : '' }}>A-</option>
                                                <option value="B+" {{ old('grupo_sanguineo') == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option value="B-" {{ old('grupo_sanguineo') == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option value="0+" {{ old('grupo_sanguineo') == '0+' ? 'selected' : '' }}>0+</option>
                                                <option value="0-" {{ old('grupo_sanguineo') == '0-' ? 'selected' : '' }}>0-</option>
                                            </select>
                                            @error('grupo_sanguineo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="alergias">Alergias</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('alergias') ? 'is-invalid' : '' }}"
                                                name="alergias" value="{{ old('alergias') }}">
                                            @error('alergias')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="contacto_emergencia">Contacto Emergencia</label>
                                            <input type="number"
                                                class="form-control {{ $errors->has('contacto_emergencia') ? 'is-invalid' : '' }}"
                                                name="contacto_emergencia" value="{{ old('contacto_emergencia') }}">
                                            @error('contacto_emergencia')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones</label>
                                            <textarea class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}"
                                                      name="observaciones"
                                                      rows="2">{{ old('observaciones') }}</textarea>
                                            @error('observaciones')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.pacientes.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-primary float-right"><i
                                                    class="bi bi-floppy"></i> Registrar paciente</button>
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
