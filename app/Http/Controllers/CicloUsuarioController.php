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
        $cicloUsuarios = CicloUsuario::with(['ciclo', 'usuario'])->get();

        return view('cicloUsuario.index', compact('cicloUsuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ciclo_id' => 'required|exists:ciclos,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha_matricula' => 'required|date',
        ]);

        $existe = CicloUsuario::where('ciclo_id', $request->ciclo_id)
            ->where('usuario_id', $request->usuario_id)
            ->where('fecha_matricula', $request->fecha_matricula)
            ->exists();

        if ($existe) {
            return redirect()->route('ciclo_usuario.create')
                ->withErrors(['error' => 'El usuario ya está matriculado en este ciclo en la misma fecha.'])
                ->withInput();
        }

        $cicloUsuario = new CicloUsuario();
        $cicloUsuario->ciclo_id = $request->ciclo_id;
        $cicloUsuario->usuario_id = $request->usuario_id;
        $cicloUsuario->fecha_matricula = $request->fecha_matricula;
        $cicloUsuario->save();

        return redirect()->route('ciclo_usuario.index')
            ->with('success', 'El usuario se ha matriculado correctamente en el ciclo.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ciclos = Ciclo::all();
        $usuarios = User::all();

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
        $request->validate([
            'ciclo_id' => 'required|exists:ciclos,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha_matricula' => 'required|date',
        ]);

        $ciclo_usuario->ciclo_id = $request->ciclo_id;
        $ciclo_usuario->usuario_id = $request->usuario_id;
        $ciclo_usuario->fecha_matricula = $request->fecha_matricula;

        $ciclo_usuario->save();

        return redirect()->route('ciclo_usuario.index')->with('success', 'Los datos del ciclo usuario se han actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CicloUsuario $ciclo_usuario)
    {
        $ciclo_usuario->delete();

        return redirect()->route('ciclo_usuario.index')->with('success', 'El ciclo usuario ha sido eliminado correctamente');
    }
}
