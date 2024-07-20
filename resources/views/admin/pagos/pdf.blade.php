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

    <br><br>

    <h4 style="text-align: center">Comprobante de pago - ORIGINAL</h4>

    <br>

    <table border="0" cellspacing="4px" style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="padding: 8px; width: 20px;"><b>Sr(es): </b></td>
            <td style="padding: 8px; width: 200px;">{{ $pago->paciente->apellidos }}, {{ $pago->paciente->nombres }}
            </td>
            <td style="padding: 8px; width: 100px;"></td>
            <td style="padding: 8px; text-align: right"><b>Fecha: </b></td>
            <td style="padding: 8px;">{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><b>Consultorio: </b></td>
            <td style="padding: 8px;" colspan="4">{{ $pago->doctor->especialidad }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><b>Monto: </b></td>
            <td style="padding: 8px;" colspan="4">$ {{ number_format($pago->monto, 2, ',', '.') }}</td>
        </tr>
    </table>

    <br><br><br><br>

    <table border="0" style="font-size: 9pt;">
        <tr>
            <td width="210px">
                <p class="text-center">
                    _____________________ <br>
                    <b>Secretaria/o</b> <br>
                    @if (Auth::user()->name == 'Administrador')
                        {{ Auth::user()->name }}
                    @else
                        {{ Auth::user()->secretarias->apellidos }}, {{ Auth::user()->secretarias->nombres }}
                    @endif
                </p>
            </td>
            <td width="270px"></td>
            <td width="210px">
                <p class="text-center">
                    _____________________ <br>
                    <b>Recibí conforme</b> <br>
                    {{ $pago->paciente->apellidos }}, {{ $pago->paciente->nombres }}
                </p>
            </td>
        </tr>
    </table>

    <hr>

    <br>
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

    <br><br>

    <h4 style="text-align: center">Comprobante de pago - DUPLICADO</h4>

    <br>

    <table border="0" cellspacing="4px" style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="padding: 8px; width: 20px;"><b>Sr(es): </b></td>
            <td style="padding: 8px; width: 200px;">{{ $pago->paciente->apellidos }}, {{ $pago->paciente->nombres }}
            </td>
            <td style="padding: 8px; width: 100px;"></td>
            <td style="padding: 8px; text-align: right"><b>Fecha: </b></td>
            <td style="padding: 8px;">{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><b>Consultorio: </b></td>
            <td style="padding: 8px;" colspan="4">{{ $pago->doctor->especialidad }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><b>Monto: </b></td>
            <td style="padding: 8px;" colspan="4">$ {{ number_format($pago->monto, 2, ',', '.') }}</td>
        </tr>
    </table>

    <br><br><br><br>

    <table border="0" style="font-size: 9pt;">
        <tr>
            <td width="210px">
                <p class="text-center">
                    _____________________ <br>
                    <b>Secretaria/o</b> <br>
                    @if (Auth::user()->name == 'Administrador')
                        {{ Auth::user()->name }}
                    @else
                        {{ Auth::user()->secretarias->apellidos }}, {{ Auth::user()->secretarias->nombres }}
                    @endif
                </p>
            </td>
            <td width="270px"></td>
            <td width="210px">
                <p class="text-center">
                    _____________________ <br>
                    <b>Recibí conforme</b> <br>
                    {{ $pago->paciente->apellidos }}, {{ $pago->paciente->nombres }}
                </p>
            </td>
        </tr>
    </table>


</body>

</html>
