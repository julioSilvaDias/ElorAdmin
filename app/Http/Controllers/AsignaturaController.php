<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use App\Models\Ciclo;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaturas = Asignatura::orderBy('created_at')->get();
        return view('asignaturas.index',['asignaturas' => $asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ciclos = Ciclo::all();
        return view('asignaturas.create',['ciclos'=> $ciclos]);
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
        return redirect()->route('asignaturas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignaturas.show',['asignatura'=>$asignatura]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura $asignatura)
    {
        $ciclos = Ciclo::all();
        return view('asignaturas.edit',['asignatura'=>$asignatura,'ciclos'=> $ciclos]);
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
        return view('asignaturas.show',['asignatura'=>$asignatura]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return redirect()->route('asignaturas.index');
    }
}
