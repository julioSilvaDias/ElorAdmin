<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::all();

        return view('horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asignaturas = \App\Models\Asignatura::pluck('nombre');
        $profesores = \App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', 'profesor');
        })->get();

        return view('horarios.create', compact('asignaturas', 'profesores'));
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

        Horario::create([
            'dia-semana' => $request->input('dia-semana'),
            'hora' => $request->input('hora'),
            'asignatura_id' => $request->input('asignatura_id')
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        return view('horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        return view('horarios.edit', ['horario' => $horario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'dia-semana' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'hora' => 'required|in:1,2,3,4,5,6',
        ]);

        $horario->update([
            'dia-semana' => $request->input('dia-semana'),
            'hora' => $request->input('hora'),
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index');
    }
}
