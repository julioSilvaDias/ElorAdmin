<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Asignatura_Usuario_Horario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Asignatura_Usuario_HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $asignatura_Usuario_Horarios = Asignatura_Usuario_Horario::orderBy('created_at')->get();
            return response()->json(['asignatura_Usuario_Horarios' => $asignatura_Usuario_Horarios], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asignatura_Usuario_Horario = new Asignatura_Usuario_Horario();
        $asignatura_Usuario_Horario->usuario_id = $request->usuario_id;
        $asignatura_Usuario_Horario->horario_id = $request->horario_id;
        $asignatura_Usuario_Horario->asignatura_id = $request->asignatura_id;
        $asignatura_Usuario_Horario->save();
        return response()->json([
            'message' => 'Recurso creado correctamente',
            'data' => $asignatura_Usuario_Horario
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura_Usuario_Horario $asignatura_Usuario_Horario)
    {
        return response()->json($asignatura_Usuario_Horario)->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignatura_Usuario_Horario $asignatura_Usuario_Horario)
    {
        $asignatura_Usuario_Horario->usuario_id = $request->usuario_id;
        $asignatura_Usuario_Horario->horario_id = $request->horario_id;
        $asignatura_Usuario_Horario->asignatura_id = $request->asignatura_id;
        $asignatura_Usuario_Horario->save();
        return response()->json([
            'message' => 'Recurso actualizado correctamente',
            'data' => $asignatura_Usuario_Horario
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura_Usuario_Horario $asignatura_Usuario_Horario)
    {
        $asignatura_Usuario_Horario->delete();
        return response()->json([
            'message' => 'Recurso eliminado correctamente'
        ], Response::HTTP_OK);
    }
}
