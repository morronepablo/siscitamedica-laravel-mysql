@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Paciente: <span class="text-danger">{{ $historial->paciente->apellidos }},
                {{ $historial->paciente->nombres }}</span>
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
                                <h3 class="card-title text-white">¿Está seguro de querer eliminar este historial?</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.historial.destroy', $historial->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre">Paciente</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $historial->paciente->apellidos }}, {{ $historial->paciente->nombres }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre">Fecha</label>
                                                    <input type="date" name="fecha_visita"
                                                        value="{{ $historial->fecha_visita }}" class="form-control"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" id="editor-container">
                                                    <label for="">Descripción de la cita</label>
                                                    <p>{!! $historial->detalle !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.historial.index') }}" class="btn btn-secondary"><i
                                                    class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-danger float-right"><i
                                                    class="bi bi-floppy"></i> Eliminar historial</button>
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
