<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horario = Horario::orderBy('created_at')->get();
        return response()->json($horario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia-semana' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'hora' => 'required|in:1,2,3,4,5,6',
            'asignatura_id' => 'required|exists:asignaturas,id',
        ]);
        $horario = Horario::create($request->all());
        $horario::save();

        return response()->json($horario);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horarios = Horario::where('profesor_id', $id)->get();

        if ($horarios->isEmpty()) {
            return response()->json(['error' => 'Horario no encontrado'], 404);
        }

        return response()->json($horarios, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'dia-semana' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'hora' => 'required|in:1,2,3,4,5,6',
            'asignatura_id' => 'required|exists:asignaturas,id',
        ]);
        $horario = Horario::update($request->all());

        return response()->json($horario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return response()->json(['message' => 'horario eliminado con exito']);
    }
}
