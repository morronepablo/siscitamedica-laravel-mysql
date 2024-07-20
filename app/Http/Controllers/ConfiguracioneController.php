<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Configuracione::all();
        return view('admin.configuraciones.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required'
        ]);

        $configuracion = new Configuracione();
        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->email = $request->email;

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'Configuración creada satisfactoriamente!')
            ->with('icono', 'success');

        // $request->validate([
        //     'nombre' => 'required',
        //     'direccion' => 'required',
        //     'telefono' => 'required',
        //     'email' => 'required',
        //     'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación del archivo de imagen
        // ]);

        // $originalName = null;

        // // Guardar la imagen en storage
        // if ($request->hasFile('logo')) {
        //     // Obtener el nombre original del archivo
        //     $originalName = $request->file('logo')->getClientOriginalName();
        //     // Guardar el archivo en storage/app/public
        //     $path = $request->file('logo')->storeAs('public', $originalName);
        //     // Obtener la URL pública para guardar en la base de datos
        //     $logoUrl = Storage::url($path);
        // }

        // // Crear nueva instancia de Configuracione
        // $configuracion = new Configuracione();
        // $configuracion->nombre = $request->nombre;
        // $configuracion->direccion = $request->direccion;
        // $configuracion->telefono = $request->telefono;
        // $configuracion->email = $request->email;
        // $configuracion->logo = $logoUrl; // Guardar la URL del logo en la base de datos

        // $configuracion->save();

        // return redirect()->route('admin.configuraciones.index')
        //     ->with('mensaje', 'Configuración creada satisfactoriamente!')
        //     ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required'
        ]);
        $configuracion = Configuracione::findOrFail($id);
        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->email = $request->email;

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'Configuración actualizada satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuraciones.delete', compact('configuracion'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        $configuracion->delete();

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'Configuración eliminada satisfactoriamente!')
            ->with('icono', 'success');
    }
}
