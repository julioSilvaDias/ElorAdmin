<?php

namespace App\Http\Controllers;

use App\Models\CicloUsuario;
use App\Models\Ciclo;
use App\Models\User;
use Illuminate\Http\Request;

class CicloUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar las relaciones 'ciclo' y 'usuario'
        $cicloUsuarios = CicloUsuario::with(['ciclo', 'usuario'])->get();
        
        return view('cicloUsuario.index', compact('cicloUsuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'id_ciclo' => 'required|exists:ciclos,id',
            'id_usuario' => 'required|exists:users,id',
        ]);

        // Creación del registro
        CicloUsuario::create([
            'id_ciclo' => $request->id_ciclo,
            'id_usuario' => $request->id_usuario,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('cicloUsuario.index')->with('success', 'El usuario se ha matriculado correctamente');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los ciclos y usuarios
        $ciclos = Ciclo::all();
        $usuarios = User::all();

        // Pasar los datos a la vista 'ciclo-usuario.create'
        return view('cicloUsuario.create', compact('ciclos', 'usuarios'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cicloUsuario = CicloUsuario::with(['ciclo', 'usuario'])->findOrFail($id);
        return view('cicloUsuario.show', compact('cicloUsuario'));
    }

    public function edit($id)
    {
        $ciclo_usuario = CicloUsuario::with(['ciclo', 'usuario'])->findOrFail($id);

        $ciclos = Ciclo::all();
        $usuarios = User::all();

        return view('cicloUsuario.edit', compact('ciclo_usuario', 'ciclos', 'usuarios'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CicloUsuario $ciclo_usuario)
    {
        // Validación de los datos
        $request->validate([
            'id_ciclo' => 'required|exists:ciclos,id',
            'id_usuario' => 'required|exists:users,id',
        ]);

        // Actualizar los valores del ciclo y usuario
        $ciclo_usuario->id_ciclo = $request->id_ciclo;
        $ciclo_usuario->id_usuario = $request->id_usuario;

        // Guardar los cambios en el registro
        $ciclo_usuario->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('cicloUsuario.index')->with('success', 'Los datos del ciclo usuario se han actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CicloUsuario $ciclo_usuario)
    {
        // Elimina el registro
        $ciclo_usuario->delete();

        // Redirige a la lista de registros con mensaje de éxito
        return redirect()->route('cicloUsuario.index')->with('success', 'Se ha eliminado la matriculación.');
    }
}
