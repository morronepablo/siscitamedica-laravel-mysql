@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Modificar Consultorio: <span class="text-success">{{ $consultorio->nombre }}</span>
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
                            <form action="{{ route('admin.consultorios.update', $consultorio->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del consultorio</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}"
                                                name="nombre" value="{{ old('nombre',$consultorio->nombre) }}" required>
                                            @error('nombre')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ubicacion">Ubicación</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('ubicacion') ? 'is-invalid' : '' }}"
                                                name="ubicacion" value="{{ old('ubicacion',$consultorio->ubicacion) }}" required>
                                            @error('ubicacion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="capacidad">Capacidad</label> <b class="text-danger">*</b>
                                            <input type="number"
                                                class="form-control {{ $errors->has('capacidad') ? 'is-invalid' : '' }}"
                                                name="capacidad" value="{{ old('capacidad',$consultorio->capacidad) }}" required>
                                            @error('capacidad')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="number"
                                                class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}"
                                                name="telefono" value="{{ old('telefono',$consultorio->telefono) }}">
                                            @error('telefono')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('especialidad') ? 'is-invalid' : '' }}"
                                                name="especialidad" value="{{ old('especialidad',$consultorio->especialidad) }}" required>
                                            @error('especialidad')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="estado">Estado</label> <b class="text-danger">*</b>
                                            <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" required>
                                                <option value="">Seleccionar</option>
                                                <option value="ACTIVO" {{ old('estado',$consultorio->estado) == 'ACTIVO' ? 'selected' : '' }}>Activo</option>
                                                <option value="INACTIVO" {{ old('estado',$consultorio->estado) == 'INACTIVO' ? 'selected' : '' }}>Inactivo</option>
                                            </select>
                                            @error('estado')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.consultorios.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="bi bi-floppy"></i> Actualizar consultorio</button>
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
