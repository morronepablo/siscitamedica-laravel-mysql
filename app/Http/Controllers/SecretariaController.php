<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretarias = Secretaria::all();
        return view('admin.secretarias.index', ['secretarias' => $secretarias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.secretarias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:255|min:3',
            'apellidos' => 'required|max:255|min:3',
            'dni' => 'required|numeric|max:99999999|min:1000000|unique:secretarias',
            'celular' => 'required|max:10',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $secretaria = new Secretaria();
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;
        $secretaria->direccion = $request->direccion;
        $secretaria->user_id = $usuario->id;
        $secretaria->save();

        $usuario->assignRole('secretaria');

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Secretaria creada satisfactoriamente!')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $secretaria = Secretaria::findOrFail($id);
        return view('admin.secretarias.show', compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria = Secretaria::findOrFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::findOrFail($id);
        $request->validate([
            'nombres' => 'required|max:255|min:3',
            'apellidos' => 'required|max:255|min:3',
            'dni' => 'required|numeric|max:99999999|min:1000000|unique:secretarias,dni,' . $secretaria->id,
            'celular' => 'required|max:10',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:users,email,' . $secretaria->user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;
        $secretaria->direccion = $request->direccion;
        $secretaria->save();

        $usuario = User::find($secretaria->user->id);
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        if ($request->password) {
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();
        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Secretaria actualizada satisfactoriamente!')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $secretaria = Secretaria::findOrFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $secretaria = Secretaria::findOrFail($id);

        //eliminar el usuaria asociado
        $user = $secretaria->user;
        $user->delete();

        //eliminar a la secretaria
        $secretaria->delete();
        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Secretaria eliminada satisfactoriamente!')
            ->with('icono', 'success');
    }
}
