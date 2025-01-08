<?php

namespace App\Http\Controllers;

use App\Models\Asignatura_Usuario_Horario;
use Illuminate\Http\Request;

class Asignatura_Usuario_HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignatura_Usuario_Horarios = Asignatura_Usuario_Horario::orderBy('created_at')->get();
        return view('asignatura_Usuario_Horarios.index',['asignatura_Usuario_Horarios' => $asignatura_Usuario_Horarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asignatura_Usuario_Horarios.create');
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
        return redirect()->route('asignatura_Usuario_Horarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura_Usuario_Horario $asignatura_Usuario_Horario)
    {
        return view('asignatura_Usuario_Horarios.show',['asignatura_Usuario_Horario'=>$asignatura_Usuario_Horario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura_Usuario_Horario $asignatura_Usuario_Horario)
    {
        return view('asignatura_Usuario_Horarios.edit',['asignatura_Usuario_Horario'=>$asignatura_Usuario_Horario]);
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
        return view('asignatura_Usuario_Horarios.show',['asignatura_Usuario_Horario'=>$asignatura_Usuario_Horario]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura_Usuario_Horario $asignatura_Usuario_Horario)
    {
        $asignatura_Usuario_Horario->delete();
        return redirect()->route('asignatura_Usuario_Horarios.index');
    }
}
