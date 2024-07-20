<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores = Doctor::all();
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:255|min:3',
            'apellidos' => 'required|max:255|min:3',
            'telefono' => 'required',
            'licencia' => 'required',
            'especialidad' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->assignRole('doctor');
        $usuario->save();

        $doctor = new Doctor();
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia = $request->licencia;
        $doctor->especialidad = $request->especialidad;
        $doctor->user_id = $usuario->id;
        $doctor->save();


        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Doctor creado satisfactoriamente!')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $request->validate([
            'nombres' => 'required|max:255|min:3',
            'apellidos' => 'required|max:255|min:3',
            'telefono' => 'required',
            'licencia' => 'required',
            'especialidad' => 'required',
            'email' => 'required|email|unique:users,email,' . $doctor->user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia = $request->licencia;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        if ($request->password) {
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Doctor actualizado satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.delete', compact('doctor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        //eliminar el usuaria asociado
        $user = $doctor->user;
        $user->delete();

        //eliminar a la secretaria
        $doctor->delete();
        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Doctor eliminado satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function reportes()
    {
        $doctores = Doctor::all();
        return view('admin.doctores.reportes', compact('doctores'));
    }

    public function pdf()
    {
        $configuracion = Configuracione::latest()->first();
        $doctores = Doctor::all();

        // return view('admin.doctores.pdf2', compact('configuracion', 'doctores'));

        // Obtener URL absoluta para el archivo de imagen
        $logoUrl = public_path('storage/logo.jpg'); // Ajusta la ruta según la ubicación real de tu archivo

        $pdf = \PDF::loadView('admin.doctores.pdf', compact('configuracion', 'doctores', 'logoUrl'));

        // Incluir la numeración de páginas y el pié de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . ' ' .  \Carbon\Carbon::now()->format('H:i'), null, 10, array(0, 0, 0));

        return $pdf->stream();
        // return $pdf->download('doctores.pdf');
    }
}
