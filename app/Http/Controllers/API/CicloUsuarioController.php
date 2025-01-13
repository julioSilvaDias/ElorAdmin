<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CicloUsuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CicloUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cicloUsuarios= CicloUsuario::orderBy('created_at')->get();
        return response()->json(['ciclosUsuario' => $cicloUsuarios])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ciclo' => 'required|exists:ciclos,id',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $cicloUsuario=CicloUsuario::create([
            'id_ciclo' => $request->id_ciclo,
            'id_usuario' => $request->id_usuario,
        ]);

        return response()->json([
            'message' => 'Recurso creado correctamente',
            'data' => $cicloUsuario
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(CicloUsuario $cicloUsuario)
    {
        return response()->json($cicloUsuario)->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CicloUsuario $cicloUsuario)
    {
        $request->validate([
            'id_ciclo' => 'required|exists:ciclos,id',
            'id_usuario' => 'required|exists:users,id',
        ]);
        $cicloUsuario->id_ciclo = $request->id_ciclo;
        $cicloUsuario->id_usuario = $request->id_usuario;
        $cicloUsuario->save();

        return response()->json([
            'message' => 'Recurso actualizado correctamente',
            'data' => $cicloUsuario
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CicloUsuario $cicloUsuario)
    {
        $cicloUsuario->delete();

        return response()->json([
            'message' => 'Recurso eliminado correctamente',
        ], Response::HTTP_OK);
    }
}