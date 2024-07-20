@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Doctor: <span class="text-danger">{{ $doctor->nombres }}, {{ $doctor->apellidos }}</span>
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
                                <h3 class="card-title text-white">¿Está seguro de querer eliminar este doctor?</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.doctores.destroy', $doctor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Nombres</label>
                                            <input type="text"
                                                class="form-control"
                                                name="nombres" value="{{ $doctor->nombres }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Apellidos</label>
                                            <input type="text"
                                                class="form-control"
                                                name="apellidos" value="{{ $doctor->apellidos }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="number"
                                                class="form-control"
                                                name="telefono" value="{{ $doctor->telefono }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="licencia">Licencia</label>
                                            <input type="number"
                                                class="form-control"
                                                name="licencia" value="{{ $doctor->licencia }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad</label>
                                            <input type="text"
                                                class="form-control"
                                                name="especialidad" value="{{ $doctor->especialidad }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email"
                                                class="form-control"
                                                name="email" value="{{ $doctor->user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.doctores.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-danger float-right"><i
                                                    class="bi bi-floppy"></i> Eliminar doctor</button>
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
