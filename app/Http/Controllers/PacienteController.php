<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:255|min:3',
            'apellidos' => 'required|max:255|min:3',
            'dni' => 'required|numeric|max:99999999|min:1000000|unique:pacientes',
            'nro_seguro' => 'nullable|numeric|max:99999999|min:1000000|unique:pacientes',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required|max:10',
            'correo' => 'required|email|unique:pacientes',
            'direccion' => 'required',
            'contacto_emergencia' => 'nullable|max:10',
        ]);

        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->nro_seguro = $request->nro_seguro;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Paciente creado satisfactoriamente!')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        $request->validate([
            'nombres' => 'required|max:255|min:3',
            'apellidos' => 'required|max:255|min:3',
            'dni' => 'required|numeric|max:99999999|min:1000000|unique:pacientes,dni,' . $paciente->id,
            'nro_seguro' => 'nullable|numeric|max:99999999|min:1000000|unique:pacientes,nro_seguro,' . $paciente->id,
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required|max:10',
            'correo' => 'required|email|unique:pacientes,correo,' . $paciente->id,
            'direccion' => 'required',
            'contacto_emergencia' => 'nullable|max:10',
        ]);

        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->nro_seguro = $request->nro_seguro;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Paciente actualizado satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Paciente eliminado satisfactoriamente!')
            ->with('icono', 'success');
    }
}
