@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <h1>Registro de una nueva configuración</h1>
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
                            <form action="{{ route('admin.configuraciones.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre Hospital/Clínica</label> <b
                                                        class="text-danger">*</b>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}"
                                                        name="nombre" value="{{ old('nombre') }}" required>
                                                    @error('nombre')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="direccion">Dirección</label> <b class="text-danger">*</b>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}"
                                                        name="direccion" value="{{ old('direccion') }}" required>
                                                    @error('direccion')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telefono">Teléfono</label> <b class="text-danger">*</b>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}"
                                                        name="telefono" value="{{ old('telefono') }}" required>
                                                    @error('telefono')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label> <b class="text-danger">*</b>
                                                    <input type="email"
                                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                        name="email" value="{{ old('email') }}" required>
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="logo">Logotipo</label>
                                            <input type="file" id="file" name="logo" class="form-control">
                                            @error('logo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <br>
                                            <center>
                                                <output id="list"></output>
                                            </center>
                                            <script>
                                                function archivo(evt) {
                                                    var files = evt.target.files; // FileList object
                                                    // Obtenemos la imagen del campo "file".
                                                    for (var i = 0, f; f = files[i]; i++) {
                                                        //Solo admitimos imágenes.
                                                        if (!f.type.match('image.*')) {
                                                            continue;
                                                        }
                                                        var reader = new FileReader();
                                                        reader.onload = (function(theFile) {
                                                            return function(e) {
                                                                // Insertamos la imagen
                                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e
                                                                    .target.result, '" width="170px" title="', escape(theFile.name), '"/>'
                                                                ].join('');
                                                            };
                                                        })(f);
                                                        reader.readAsDataURL(f);
                                                    }
                                                }
                                                document.getElementById('file').addEventListener('change', archivo, false);
                                            </script>
                                        </div>
                                    </div> --}}
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.configuraciones.index') }}"
                                                class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-primary float-right"><i
                                                    class="bi bi-floppy"></i> Registrar configuración</button>
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
