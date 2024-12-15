<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ciclos = Ciclo::orderBy('created_at')->get();
        return view('ciclos.index',['ciclos' => $ciclos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ciclos.create');
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
        return redirect()->route('ciclos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciclo $ciclo)
    {
        return view('ciclos.show',['ciclo'=>$ciclo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ciclo $ciclo)
    {
        return view('ciclos.edit',['ciclo'=>$ciclo]);
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
        return view('ciclos.show',['ciclo'=>$ciclo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ciclo $ciclo)
    {
        $ciclo->delete();
        return redirect()->route('ciclos.index');
    }
}
