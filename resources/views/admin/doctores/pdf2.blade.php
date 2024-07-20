<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1" style="font-size: 9pt">
        <tr>
            <td style="text-align: center">
                {{ $configuracion->nombre }} <br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->email }}
            </td>
            <td width="330px"></td>
            <td>
                <img src="{{ asset('storage/logo.png') }}" alt="logo" width="80px">
            </td>
        </tr>
    </table>

    <h2 style="text-align: center">Listado del personal médico</h2>
</body>

</html>
