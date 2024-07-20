@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Registro de un nuevo historial</h1>
        <hr>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-1">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="btn bg-transparent btn-sm">
                                <h3 class="card-title">Llene los datos</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.historial.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre">Paciente</label> <b class="text-danger">*</b>
                                                    <select name="paciente_id" id="paciente_id" class="form-control select2"
                                                        style="width: 100%" required>
                                                        <option></option>
                                                        @foreach ($pacientes as $paciente)
                                                            <option value="{{ $paciente->id }}">{{ $paciente->apellidos }},
                                                                {{ $paciente->nombres }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('paciente_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <style>
                                                    .select2-container .select2-selection--single {
                                                        height: 38px;
                                                    }
                                                </style>
                                                <script>
                                                    $('#paciente_id').select2({
                                                        placeholder: 'Selecciona un paciente', // Placeholder en español
                                                        allowClear: true, // Esto permite limpiar la selección
                                                        language: 'es' // Configuración de idioma en español
                                                    });
                                                </script>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha_visita">Fecha</label> <b class="text-danger">*</b>
                                                    <input type="date" name="fecha_visita" value="<?= date('Y-m-d') ?>"
                                                        class="form-control">
                                                    @error('fecha_visita')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" id="editor-container">
                                                    <label for="">Descripción de la cita</label> <b
                                                        class="text-danger">*</b>
                                                    <textarea class="form-control" name="detalle" id="editor" cols="30" rows="100"></textarea>

                                                    <style>
                                                        #editor-container {
                                                            height: 200px;
                                                            overflow: auto;
                                                        }
                                                    </style>
                                                    <script type="importmap">
                                                        {
                                                            "imports": {
                                                                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
                                                                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
                                                            }
                                                        }
                                                    </script>
                                                    <script type="module">
                                                        import {
                                                            ClassicEditor,
                                                            Essentials,
                                                            Bold,
                                                            Italic,
                                                            Font,
                                                            Paragraph
                                                        } from 'ckeditor5';

                                                        ClassicEditor
                                                            .create(document.querySelector('#editor'), {
                                                                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                                                                toolbar: {
                                                                    items: [
                                                                        'undo', 'redo', '|', 'bold', 'italic', '|',
                                                                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                                                    ]
                                                                }
                                                            })
                                                            .then( /* ... */ )
                                                            .catch( /* ... */ );
                                                    </script>
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
                                            <button type="submit" class="btn btn-primary float-right"><i
                                                    class="bi bi-floppy"></i> Registrar Historial</button>
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
