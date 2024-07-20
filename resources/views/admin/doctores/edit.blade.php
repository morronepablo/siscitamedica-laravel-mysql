@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Modificar Doctor: <span class="text-success">{{ $doctor->nombres }}, {{ $doctor->apellidos }}</span>
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
                            <form action="{{ route('admin.doctores.update', $doctor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Nombres</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}"
                                                name="nombres" value="{{ old('nombres',$doctor->nombres) }}" required>
                                            @error('nombres')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Apellidos</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}"
                                                name="apellidos" value="{{ old('apellidos',$doctor->apellidos) }}" required>
                                            @error('apellidos')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label> <b class="text-danger">*</b>
                                            <input type="number"
                                                class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}"
                                                name="telefono" value="{{ old('telefono',$doctor->telefono) }}" required>
                                            @error('telefono')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="licencia">Licencia</label> <b class="text-danger">*</b>
                                            <input type="number"
                                                class="form-control {{ $errors->has('licencia') ? 'is-invalid' : '' }}"
                                                name="licencia" value="{{ old('licencia',$doctor->licencia) }}" required>
                                            @error('licencia')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('especialidad') ? 'is-invalid' : '' }}"
                                                name="especialidad" value="{{ old('especialidad',$doctor->especialidad) }}" required>
                                            @error('especialidad')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email">Email</label> <b class="text-danger">*</b>
                                            <input type="email"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                name="email" value="{{ old('email',$doctor->user->email) }}" required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input type="password"
                                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                name="password" value="{{ old('password') }}">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirmar Contraseña</label>
                                            <input type="password"
                                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.doctores.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="bi bi-floppy"></i> Actualizar doctor</button>
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
