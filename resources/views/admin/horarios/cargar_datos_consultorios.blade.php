<hr>
<h3>
    <center>Horario de atención del consultorio de {{ $consultorio->nombre }}</center>
</h3>
<hr>
<table class="table table-striped table-hover table-sm table-bordered">
    <thead class="thead-dark">
        <tr class="text-center">
            <th class="bg-dark text-white">Hora</th>
            <th class="bg-dark text-white">Lunes</th>
            <th class="bg-dark text-white">Martes</th>
            <th class="bg-dark text-white">Miércoles</th>
            <th class="bg-dark text-white">Jueves</th>
            <th class="bg-dark text-white">Viernes</th>
            <th class="bg-dark text-white">Sábado</th>
            <th class="bg-dark text-white">Domingo</th>
        </tr>
    </thead>
    <tbody>
        @php
            $horas = [
                '08:00:00 - 08:30:00',
                '08:30:00 - 09:00:00',
                '09:00:00 - 09:30:00',
                '09:30:00 - 10:00:00',
                '10:00:00 - 10:30:00',
                '10:30:00 - 11:00:00',
                '11:00:00 - 11:30:00',
                '11:30:00 - 12:00:00',
                '12:00:00 - 12:30:00',
                '12:30:00 - 13:00:00',
                '13:00:00 - 13:30:00',
                '13:30:00 - 14:00:00',
                '14:00:00 - 14:30:00',
                '14:30:00 - 15:00:00',
                '15:00:00 - 15:30:00',
                '15:30:00 - 16:00:00',
                '16:00:00 - 16:30:00',
                '16:30:00 - 17:00:00',
                '17:00:00 - 17:30:00',
                '17:30:00 - 18:00:00',
                '18:00:00 - 18:30:00',
                '18:30:00 - 19:00:00',
                '19:00:00 - 19:30:00',
                '19:30:00 - 20:00:00',
            ];
            $diasSemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        @endphp
        @foreach ($horas as $hora)
            @php
                [$hora_inicio, $hora_fin] = explode(' - ', $hora);
            @endphp
            <tr class="text-center">
                <td>{{ substr($hora_inicio, 0, 5) }} - {{ substr($hora_fin, 0, 5) }}</td>
                @foreach ($diasSemana as $dia)
                    @php
                        $nombre_doctor = '';
                        foreach ($horarios as $horario) {
                            if (
                                $horario->dia == $dia &&
                                $hora_inicio >= $horario->hora_inicio &&
                                $hora_fin <= $horario->hora_fin
                            ) {
                                $nombre_doctor = $horario->doctor->nombres . ', ' . $horario->doctor->apellidos;
                                break;
                            }
                        }
                    @endphp
                    <td class="text-left">{{ $nombre_doctor }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
