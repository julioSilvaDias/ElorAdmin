<?php

namespace App\Http\Controllers;

use App\Models\ciclo_usuario;
use Illuminate\Http\Request;

class CicloUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(CicloUsuario::all());
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
        //
        $request->validate([
            'id_ciclo' => 'required|exists:ciclos,id',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $cicloUsuario = CicloUsuario::create($request->only(['id_ciclo', 'id_usuario']));
        return response()->json(['message' => 'El usuario se ha matriculado correctamente', 'data' => $cicloUsuario], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ciclo_usuario $ciclo_usuario)
    {
        //
        $cicloUsuario = CicloUsuario::where('id_usuario', $id)->get();

        if ($cicloUsuario->isEmpty()) {
            return response()->json(['message' => 'No se encontraron registros'], 404);
        }

        return response()->json($cicloUsuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ciclo_usuario $ciclo_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ciclo_usuario $ciclo_usuario)
    {
        //
        $cicloUsuario = CicloUsuario::find($id);

        if (!$cicloUsuario) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $cicloUsuario->update($request->only(['id_ciclo', 'id_usuario']));
        return response()->json(['message' => 'Los datos se han actualizado', 'data' => $cicloUsuario]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ciclo_usuario $ciclo_usuario)
    {
        //
        $cicloUsuario = CicloUsuario::find($id);

        if (!$cicloUsuario) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $cicloUsuario->delete();
        return response()->json(['message' => 'Se ha eliminado la matriculación.']);
    }
}
