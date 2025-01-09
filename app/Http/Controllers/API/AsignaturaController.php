<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaturas = Asignatura::orderBy('created_at')->get();
        return response()->json(['asignaturas' => $asignaturas])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asignatura = new Asignatura();
        $asignatura->nombre = $request->nombre;
        $asignatura->descripcion = $request->descripcion;
        $asignatura->ciclo_id = $request->ciclo_id;
        $asignatura->save();
        return response()->json([
            'message' => 'Recurso creado correctamente',
            'data' => $asignatura
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura)
    {
        return response()->json($asignatura)->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $asignatura->nombre = $request->nombre;
        $asignatura->descripcion = $request->descripcion;
        $asignatura->ciclo_id = $request->ciclo_id;
        $asignatura->save();
        return response()->json([
            'message' => 'Recurso actualizado correctamente',
            'data' => $asignatura
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return response()->json([
            'message' => 'Recurso creado correctamente',
        ], Response::HTTP_OK);
    }
}
