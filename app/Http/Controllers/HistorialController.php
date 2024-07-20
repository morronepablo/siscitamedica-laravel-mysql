<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = Historial::with('paciente', 'doctor')->get();
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        return view('admin.historial.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);

        $historial = new Historial();

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
            ->with('mensaje', 'Se registró el historial satisfactoriamente!')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historial = Historial::findOrFail($id);
        return view('admin.historial.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historial = Historial::findOrFail($id);
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        return view('admin.historial.edit', compact('historial', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $historial = Historial::findOrFail($id);
        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;

        $historial->save();

        return redirect()->route('admin.historial.index')
            ->with('mensaje', 'Se actualizó el historial satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $historial = Historial::findOrFail($id);
        return view('admin.historial.delete', compact('historial'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $historial = Historial::findOrFail($id);
        $historial->delete();

        return redirect()->route('admin.historial.index')
            ->with('mensaje', 'Se eliminó el historial satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function pdf($id)
    {
        $configuracion = Configuracione::latest()->first();
        $historial = Historial::findOrFail($id);

        // return view('admin.doctores.pdf2', compact('configuracion', 'doctores'));

        // Obtener URL absoluta para el archivo de imagen
        $logoUrl = public_path('storage/logo.jpg'); // Ajusta la ruta según la ubicación real de tu archivo

        $pdf = \PDF::loadView('admin.historial.pdf', compact('configuracion', 'historial', 'logoUrl'));

        // Incluir la numeración de páginas y el pié de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . ' ' .  \Carbon\Carbon::now()->format('H:i'), null, 10, array(0, 0, 0));

        return $pdf->stream();
    }

    public function paciente(Request $request)
    {
        $dni = $request->dni;
        $paciente = Paciente::where('dni', $dni)->first();
        return view('admin.historial.paciente', compact('paciente'));
    }

    public function historial($id)
    {
        $configuracion = Configuracione::latest()->first();

        $paciente = Paciente::findOrFail($id);
        $historiales = Historial::where('paciente_id', $id)->get();

        // return view('admin.doctores.pdf2', compact('configuracion', 'doctores'));

        // Obtener URL absoluta para el archivo de imagen
        $logoUrl = public_path('storage/logo.jpg'); // Ajusta la ruta según la ubicación real de tu archivo

        $pdf = \PDF::loadView('admin.historial.historial', compact('configuracion', 'historiales', 'paciente', 'logoUrl'));

        // Incluir la numeración de páginas y el pié de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . ' ' .  \Carbon\Carbon::now()->format('H:i'), null, 10, array(0, 0, 0));

        return $pdf->stream();
    }
}
