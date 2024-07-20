<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $totalSecretarias = Secretaria::count();
        $totalPacientes = Paciente::count();
        $totalConsultorios = Consultorio::count();
        $totalDoctores = Doctor::count();
        $totalHorarios = Horario::count();
        $totalReservas = Event::count();
        $totalConfiguraciones = Configuracione::count();
        $totalPagos = Pago::count();
        $totalCobrado = Pago::sum('monto');

        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $eventos = Event::all();

        return view(
            'admin.index',
            compact(
                'totalUsuarios',
                'totalSecretarias',
                'totalPacientes',
                'totalConsultorios',
                'totalDoctores',
                'totalHorarios',
                'totalReservas',
                'totalConfiguraciones',
                'totalPagos',
                'totalCobrado',
                'consultorios',
                'doctores',
                'eventos'
            )
        );
    }

    public function reservas($id)
    {
        $eventos = Event::where('user_id', $id)->get();
        return view('admin.reservas', compact('eventos'));
    }
}
