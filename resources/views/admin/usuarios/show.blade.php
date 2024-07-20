@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Usuario: <span class="text-info">{{ $usuario->name }}</span></h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Datos Registrados</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del usuario</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $usuario->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $usuario->email }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.usuarios.index') }}"
                                            class="btn btn-secondary float-right"><i class="bi bi-reply"></i> Volver</a>
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
