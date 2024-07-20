@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Busqueda de paciente: </h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Buscar al paciente</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.historial.paciente') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">D.N.I.</label>
                                            <input type="text" name="dni" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div style="height: 32px;"></div>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>
                                                Buscar</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @if ($paciente)
                                    <h4>Información del paciente:</h4>
                                    <div class="row">
                                        <table class="ml-2">
                                            <tr>
                                                <td><b>Paciente: </b></td>
                                                <td>{{ $paciente->apellidos }},
                                                    {{ $paciente->nombres }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>DNI: </b></td>
                                                <td>{{ number_format($paciente->dni, 0, '', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Nro. Seguro: </b></td>
                                                <td>{{ $paciente->nro_seguro }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Fecha Nacimiento: </b></td>
                                                <td>{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <br>
                                    <a href="{{ route('admin.historial.historial', $paciente->id) }}"
                                        class="btn btn-warning" target="_blank">Imprimir historial del paciente</a>
                                @else
                                    <p>Paciente no registrado</p>
                                @endif
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <a href="{{ route('admin.historial.index') }}"
                                                    class="btn btn-secondary float-right"><i class="bi bi-reply"></i>
                                                    Volver</a>
                                            </div>
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
