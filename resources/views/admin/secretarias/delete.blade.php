@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Secretaria: <span class="text-danger">{{ $secretaria->nombres }}, {{ $secretaria->apellidos }}</span>
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
                                <h3 class="card-title text-white">¿Está seguro de querer eliminar esta secretaria?</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.secretarias.destroy', $secretaria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Nombres</label>
                                            <input type="text" class="form-control" name="nombres"
                                                value="{{ $secretaria->nombres }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Apellidos</label>
                                            <input type="text" class="form-control" name="apellidos"
                                                value="{{ $secretaria->apellidos }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">D.N.I.</label>
                                            <input type="number" class="form-control" name="dni"
                                                value="{{ $secretaria->dni }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Celular</label>
                                            <input type="text" class="form-control" name="celular"
                                                value="{{ $secretaria->celular }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Fecha Nacimiento</label>
                                            <input type="date" class="form-control" name="fecha_nacimiento"
                                                value="{{ $secretaria->fecha_nacimiento }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="email">Dirección</label>
                                            <input type="text" class="form-control" name="direccion"
                                                value="{{ $secretaria->direccion }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $secretaria->user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.secretarias.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-danger float-right"><i
                                                    class="bi bi-floppy"></i> Eliminar secretaria</button>
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
