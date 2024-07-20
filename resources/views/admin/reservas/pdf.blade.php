<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table border="0" style="font-size: 9pt">
        <tr>
            <td style="text-align: center" width="200px">
                {{ $configuracion->nombre }} <br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->email }}
            </td>
            <td width="400px"></td>
            <td>
                <img src="{{ $logoUrl }}" alt="logo" width="80px">
            </td>
        </tr>
    </table>

    <br>

    <h2 style="text-align: center">Listado de todas las reservas</h2>

    <br>

    <table class="table table-bordered table-sm table-striped">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Nro</th>
                <th>Doctor</th>
                <th>Especialidad</th>
                <th>Fecha Reserva</th>
                <th>Hora Reserva</th>
            </tr>
        </thead>
        <tbody>
            @php
                $contador = 1;
            @endphp
            @foreach ($eventos as $evento)
                <tr>
                    <td class="text-center">{{ $contador++ }}</td>
                    <td>{{ $evento->doctor->apellidos }}, {{ $evento->doctor->nombres }}</td>
                    <td>{{ $evento->doctor->especialidad }}</td>
                    <td>
                        <center>{{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                        </center>
                    </td>
                    <td>
                        <center>{{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</center>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
