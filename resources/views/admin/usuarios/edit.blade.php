@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Modificar usuario: <span class="text-success">{{ $usuario->name }}</span></h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Llene los datos</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre del usuario</label> <b class="text-danger">*</b>
                                            <input type="text"
                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                name="name" value="{{ old('name', $usuario->name) }}" required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email</label> <b class="text-danger">*</b>
                                            <input type="email"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                name="email" value="{{ old('email', $usuario->email) }}" required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
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
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
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
                                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="bi bi-floppy"></i> Actualizar usuario</button>
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
