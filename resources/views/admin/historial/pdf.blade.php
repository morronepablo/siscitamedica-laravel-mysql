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

    <h3 style="text-align: center">Historial clínico</h3>

    <br>

    <h4>Información del paciente:</h4>

    <table>
        <tr>
            <td><b>Paciente: </b></td>
            <td>{{ $historial->paciente->apellidos }}, {{ $historial->paciente->nombres }}</td>
        </tr>
        <tr>
            <td><b>DNI: </b></td>
            <td>{{ number_format($historial->paciente->dni, 0, '', '.') }}</td>
        </tr>
        <tr>
            <td><b>Nro. Seguro: </b></td>
            <td>{{ $historial->paciente->nro_seguro }}</td>
        </tr>
        <tr>
            <td><b>Fecha Nacimiento: </b></td>
            <td>{{ \Carbon\Carbon::parse($historial->paciente->fecha_nacimiento)->format('d/m/Y') }}</td>
        </tr>
    </table>

    <hr>

    <h4>Información del doctor:</h4>

    <table>
        <tr>
            <td><b>Doctor: </b></td>
            <td>{{ $historial->doctor->apellidos }}, {{ $historial->doctor->nombres }}</td>
        </tr>
        <tr>
            <td><b>Licencia Médica: </b></td>
            <td>{{ $historial->doctor->licencia }}</td>
        </tr>
        <tr>
            <td><b>Especialidad: </b></td>
            <td>{{ $historial->doctor->especialidad }}</td>
        </tr>
    </table>

    <hr>

    <h4>Diagnostico realizado:</h4>

    <table>
        <tr>
            <td><b>Fecha: </b></td>
            <td>{{ \Carbon\Carbon::parse($historial->fecha_visita)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><b>Resultado: </b></td>
            <td>{!! $historial->detalle !!}</td>
        </tr>
    </table>
</body>

</html>
