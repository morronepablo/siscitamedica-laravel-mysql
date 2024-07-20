@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Consultorio: <span class="text-info">{{ $consultorio->nombre }}</span></h1>
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre del consultorio</label>
                                        <input type="text"
                                            class="form-control"
                                            name="nombre" value="{{ $consultorio->nombre }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ubicacion">Ubicación</label>
                                        <input type="text"
                                            class="form-control"
                                            name="ubicacion" value="{{ $consultorio->ubicacion }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="capacidad">Capacidad</label>
                                        <input type="number"
                                            class="form-control"
                                            name="capacidad" value="{{ $consultorio->capacidad }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="number"
                                            class="form-control"
                                            name="telefono" value="{{ $consultorio->telefono }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="especialidad">Especialidad</label>
                                        <input type="text"
                                            class="form-control"
                                            name="especialidad" value="{{ $consultorio->especialidad }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" name="estado" disabled>
                                            <option value="ACTIVO" {{ $consultorio->estado == 'ACTIVO' ? 'selected' : '' }}>Activo</option>
                                            <option value="INACTIVO" {{ $consultorio->estado == 'INACTIVO' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <a href="{{ route('admin.consultorios.index') }}"
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
