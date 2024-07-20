@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Modificar Secretaria: <span class="text-success">{{ $secretaria->nombres }}, {{ $secretaria->apellidos }}</span>
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
                            <form action="{{ route('admin.secretarias.update', $secretaria->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Nombres</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}"
                                                name="nombres" value="{{ old('nombres', $secretaria->nombres) }}" required>
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
                                                name="apellidos" value="{{ old('apellidos', $secretaria->apellidos) }}"
                                                required>
                                            @error('apellidos')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">D.N.I.</label> <b class="text-danger">*</b>
                                            <input type="number"
                                                class="form-control {{ $errors->has('dni') ? 'is-invalid' : '' }}"
                                                name="dni" value="{{ old('dni', $secretaria->dni) }}" required>
                                            @error('dni')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Celular</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                                                name="celular" value="{{ old('celular', $secretaria->celular) }}" required>
                                            @error('celular')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Fecha Nacimiento</label> <b class="text-danger">*</b>
                                            <input type="date"
                                                class="form-control {{ $errors->has('fecha_nacimiento') ? 'is-invalid' : '' }}"
                                                name="fecha_nacimiento"
                                                value="{{ old('fecha_nacimiento', $secretaria->fecha_nacimiento) }}"
                                                required>
                                            @error('fecha_nacimiento')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="email">Dirección</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}"
                                                name="direccion" value="{{ old('direccion', $secretaria->direccion) }}"
                                                required>
                                            @error('direccion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Email</label> <b class="text-danger">*</b>
                                            <input type="email"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                name="email" value="{{ old('email', $secretaria->user->email) }}"
                                                required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="password">Contraseña</label> <b class="text-danger">*</b>
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
                                            <label for="password_confirmation">Confirmar Contraseña</label> <b
                                                class="text-danger">*</b>
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
                                            <a href="{{ route('admin.secretarias.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="bi bi-floppy"></i> Actualizar secretaria</button>
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
