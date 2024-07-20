@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Reportes de reservas</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-4">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Generar Reporte</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('admin.reservas.pdf') }}" class="btn btn-success" target="_blank"><i
                                    class="bi bi-printer"></i> Listado de todas las reservas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ml-1">
                <div class="col-md-8">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Generar Reporte por fechas</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.reservas.pdf_fechas') }}" method="GET" target="_blank">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Fecha Inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Fecha Fin</label>
                                        <input type="date" name="fecha_fin" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success" style="margin-top: 31px"><i
                                                class="bi bi-printer"></i> Generar
                                            reporte</button>
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
