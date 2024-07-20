@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Paciente: <span class="text-danger">{{ $paciente->nombres }}, {{ $paciente->apellidos }}</span>
        </h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title text-white">¿Está seguro de querer eliminar este paciente?</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pacientes.destroy', $paciente->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombres">Nombres</label>
                                            <input type="text"
                                                class="form-control"
                                                name="nombres" value="{{ $paciente->nombres }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos</label>
                                            <input type="text"
                                                class="form-control"
                                                name="apellidos" value="{{ $paciente->apellidos }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dni">D.N.I.</label>
                                            <input type="number"
                                                class="form-control"
                                                name="dni" value="{{ $paciente->dni }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nro_seguro">Nro. Seguro</label>
                                            <input type="number"
                                                class="form-control"
                                                name="nro_seguro" value="{{ $paciente->nro_seguro }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha Nacimiento</label>
                                            <input type="date"
                                                class="form-control"
                                                name="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="genero">Género</label> <b class="text-danger">*</b>
                                            <select class="form-control" name="genero" disabled>
                                                <option value="M" {{ $paciente->genero == 'M' ? 'selected' : '' }}>Masculino</option>
                                                <option value="F" {{ $paciente->genero == 'F' ? 'selected' : '' }}>Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="celular">Celular</label>
                                            <input type="number"
                                                class="form-control"
                                                name="celular" value="{{ $paciente->celular }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="correo">Correo</label>
                                            <input type="email"
                                                class="form-control"
                                                name="correo" value="{{ $paciente->correo }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input type="text"
                                                class="form-control"
                                                name="direccion" value="{{ $paciente->direccion }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="grupo_sanguineo">Grupo Sanguineo</label>
                                            <select class="form-control" name="grupo_sanguineo" disabled>
                                                <option value="A+" {{ $paciente->grupo_sanguineo == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option value="A-" {{ $paciente->grupo_sanguineo == 'A-' ? 'selected' : '' }}>A-</option>
                                                <option value="B+" {{ $paciente->grupo_sanguineo == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option value="B-" {{ $paciente->grupo_sanguineo == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option value="0+" {{ $paciente->grupo_sanguineo == '0+' ? 'selected' : '' }}>0+</option>
                                                <option value="0-" {{ $paciente->grupo_sanguineo == '0-' ? 'selected' : '' }}>0-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="alergias">Alergias</label>
                                            <input type="text"
                                                class="form-control"
                                                name="alergias" value="{{ $paciente->alergias }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="contacto_emergencia">Contacto Emergencia</label>
                                            <input type="number"
                                                class="form-control"
                                                name="contacto_emergencia" value="{{ $paciente->contacto_emergencia }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones</label>
                                            <textarea class="form-control"
                                                      name="observaciones"
                                                      disabled
                                                      rows="2">{{ $paciente->observaciones }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.pacientes.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-danger float-right"><i
                                                    class="bi bi-floppy"></i> Eliminar paciente</button>
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
