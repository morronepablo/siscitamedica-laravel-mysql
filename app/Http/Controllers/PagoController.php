<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pago;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Barryvdh\DomPDF\Facade\Pdf;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        $total_monto = Pago::sum('monto');
        return view('admin.pagos.index', compact('pagos', 'total_monto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        $doctores = Doctor::orderBy('apellidos', 'asc')->get();
        return view('admin.pagos.create', compact('pacientes', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);
        $request->validate([
            'monto' => 'required',
            'fecha_pago' => 'required',
            'descripcion' => 'required'
        ]);

        $pago = new Pago();
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->descripcion = $request->descripcion;
        $pago->paciente_id = $request->paciente_id;
        $pago->doctor_id = $request->doctor_id;
        $pago->save();

        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se registró el pago satisfactoriamente!')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return view('admin.pagos.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pago = Pago::findOrFail($id);
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        $doctores = Doctor::orderBy('apellidos', 'asc')->get();
        return view('admin.pagos.edit', compact('pago', 'pacientes', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required',
            'fecha_pago' => 'required',
            'descripcion' => 'required'
        ]);

        $pago = Pago::findOrFail($id);
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->descripcion = $request->descripcion;
        $pago->paciente_id = $request->paciente_id;
        $pago->doctor_id = $request->doctor_id;
        $pago->save();

        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se actualizó el pago satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $pago = Pago::findOrFail($id);
        return view('admin.pagos.delete', compact('pago'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('admin.pagos.index')
            ->with('mensaje', 'Se eliminó el pago satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function pdf($id)
    {
        $configuracion = Configuracione::latest()->first();
        $pago = Pago::findOrFail($id);

        // Obtener URL absoluta para el archivo de imagen
        $logoUrl = public_path('storage/logo.jpg'); // Ajusta la ruta según la ubicación real de tu archivo

        $pdf = \PDF::loadView('admin.pagos.pdf', compact('configuracion', 'pago', 'logoUrl'));

        return $pdf->stream();
    }
}
