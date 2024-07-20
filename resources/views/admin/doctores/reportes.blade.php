@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Reportes de doctores</h1>
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
                            <a href="{{ route('admin.doctores.pdf') }}" class="btn btn-success"><i
                                    class="bi bi-printer"></i> Listado del personal
                                médico</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
