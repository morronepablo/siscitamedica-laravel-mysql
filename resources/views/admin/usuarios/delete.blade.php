@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Usuario: <span class="text-danger">{{ $usuario->name }}</span></h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title text-white">¿Está seguro de querer eliminar este usuario?</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
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
                                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-danger float-right"><i
                                                    class="bi bi-trash3"></i> Eliminar usuario</button>
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
