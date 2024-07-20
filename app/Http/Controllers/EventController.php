<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);

        $request->validate([
            'fecha_reserva' => 'required',
            'hora_reserva' => 'required'
        ]);

        $doctor = Doctor::find($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva = $request->hora_reserva . ':00';


        // Crear un objeto DateTime a partir de la fecha de reserva
        $date = new DateTime($fecha_reserva);

        // Obtener el día de la semana en español
        $dias_semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        $dia_semana = $dias_semana[$date->format('w')];
        $dia_de_reserva = $dia_semana;

        // Valida si existe el horario del doctor
        $horarios = Horario::where('doctor_id', $doctor->id)
            ->where('dia', $dia_de_reserva)
            ->where('hora_inicio', '<=', $hora_reserva)
            ->where('hora_fin', '>=', $hora_reserva)
            ->exists();

        if (!$horarios) {
            return redirect()->back()->with([
                'mensaje' => 'El doctor no está disponible en ese horario.',
                'icono' => 'error',
                'hora_reserva' => 'El doctor no está disponible en ese horario.'
            ]);
        }

        $fecha_hora_reserva = $fecha_reserva . ' ' . $hora_reserva;

        // Valida si existe eventos duplicados
        $eventos_duplicados = Event::where('doctor_id', $doctor->id)
            ->where('start', $fecha_hora_reserva)
            ->exists();

        if ($eventos_duplicados) {
            return redirect()->back()->with([
                'mensaje' => 'Ya existe una reserva con el doctor en ese horario.',
                'icono' => 'error',
                'hora_reserva' => 'Ya existe una reserva con el doctor en ese horario.'
            ]);
        }

        $evento = new Event();
        $evento->title = $request->hora_reserva . ' ' . $doctor->especialidad;
        $evento->start = $request->fecha_reserva . ' ' . $hora_reserva;
        $evento->end = $request->fecha_reserva . ' ' . $hora_reserva;
        $evento->color = '#e82216';
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $doctor->id;
        $evento->consultorio_id = '1';
        $evento->save();

        return redirect()->route('admin.index')
            ->with('mensaje', 'Se registró la reserva satisfactoriamente!')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::destroy($id);

        return redirect()->back()->with([
            'mensaje' => 'Se eliminó la reserva satisfactoriamente!',
            'icono' => 'success'
        ]);
    }

    public function reportes()
    {
        return view('admin.reservas.reportes');
    }

    public function pdf()
    {
        $configuracion = Configuracione::latest()->first();
        $eventos = Event::all();

        // return view('admin.doctores.pdf2', compact('configuracion', 'doctores'));

        // Obtener URL absoluta para el archivo de imagen
        $logoUrl = public_path('storage/logo.jpg'); // Ajusta la ruta según la ubicación real de tu archivo

        $pdf = \PDF::loadView('admin.reservas.pdf', compact('configuracion', 'eventos', 'logoUrl'));

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

    public function pdf_fechas(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);

        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        // Convertir fechas a instancias de Carbon para facilitar el manejo de fechas y horas
        $fecha_inicio = Carbon::parse($fecha_inicio)->startOfDay();
        $fecha_fin = Carbon::parse($fecha_fin)->endOfDay();

        // Formatear fechas para la vista en el formato 'd/m/Y'
        $fecha_inicio_formateada = $fecha_inicio->format('d/m/Y');
        $fecha_fin_formateada = $fecha_fin->format('d/m/Y');

        $configuracion = Configuracione::latest()->first();
        $eventos = Event::whereBetween('start', [$fecha_inicio, $fecha_fin])->get();

        // Obtener URL absoluta para el archivo de imagen
        $logoUrl = public_path('storage/logo.jpg'); // Ajusta la ruta según la ubicación real de tu archivo

        $pdf = \PDF::loadView('admin.reservas.pdf_fechas', compact('configuracion', 'eventos', 'logoUrl', 'fecha_inicio_formateada', 'fecha_fin_formateada'));

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
