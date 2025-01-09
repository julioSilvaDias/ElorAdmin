<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ciclos = Ciclo::orderBy('created_at')->get();
        return response()->json(['ciclos' => $ciclos])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ciclo = new Ciclo();
        $ciclo->nombre = $request->nombre;
        $ciclo->curso = $request->curso;
        $ciclo->descripcion = $request->descripcion;
        $ciclo->save();
        return response()->json([
            'message' => 'Recurso creado correctamente',
            'data' => $ciclo
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciclo $ciclo)
    {
        return response()->json($ciclo)->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        $ciclo->nombre = $request->nombre;
        $ciclo->curso = $request->curso;
        $ciclo->descripcion = $request->descripcion;
        $ciclo->save();
        return response()->json([
            'message' => 'Recurso creado correctamente',
            'data' => $ciclo
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ciclo $ciclo)
    {
        $ciclo->delete();
        return response()->json([
            'message' => 'Recurso creado correctamente'
        ], Response::HTTP_OK);
    }
}
