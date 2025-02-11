<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Cargar las reuniones
        $reunions = Reunion::all();

        return view('reunions.index', ['reunions' => $reunions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reunions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reunion = new Reunion();
        $reunion->comentario = $request->input('comentario');
        $reunion->estado = $request->input('estado', 'pendiente');
        $reunion->{'fecha-hora-inicio'} = $request->input('fecha-hora-inicio');
        $reunion->{'fecha-hora-fin'} = $request->input('fecha-hora-fin');
        $reunion->emisor_id = $request->input('emisor_id');
        $reunion->receptor_id = $request->input('receptor_id');
        $reunion->save();

        return redirect()->route('reunions.index')->with('success', 'Reunión creada correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reunion $reunion)
    {
        return view('reunions.show', compact('reunion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reunion $reunion)
    {
        return view('reunions.edit', ['reunion' => $reunion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reunion $reunion)
    {
        // Actualizar los campos de la reunión
        $reunion->comentario = $request->input('comentario');
        $reunion->estado = $request->input('estado', $reunion->estado);
        $reunion->{'fecha-hora-inicio'} = $request->input('fecha-hora-inicio');
        $reunion->{'fecha-hora-fin'} = $request->input('fecha-hora-fin');
        $reunion->emisor_id = $request->input('emisor_id');
        $reunion->receptor_id = $request->input('receptor_id');
        $reunion->save();

        return redirect()->route('reunions.index')->with('success', 'Reunión actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reunion $reunion)
    {
        $reunion->delete();

        return redirect()->route('reunions.index');
    }

    public function reunionesHoyAceptada()
    {
        //Cargar las reuniones
        $reunions = Reunion::whereDate('fecha-hora-inicio', Carbon::today())->where('estado', 'aceptado')->get();

        return view('reunions.index', ['reunions' => $reunions]);
    }

    public function reunionesHoyPendiente()
    {
        //Cargar las reuniones
        $reunions = Reunion::whereDate('fecha-hora-inicio', Carbon::today())->where('estado', 'pendiente')->get();

        return view('reunions.index', ['reunions' => $reunions]);
    }

    public function reunionesApartirHoy()
    {
        //Cargar las reuniones
        $reunions = Reunion::whereDate('fecha-hora-inicio', '>=', Carbon::today())->where('estado', 'pendiente')->orWhere('estado', 'aceptado')->get();

        return view('reunions.index', ['reunions' => $reunions]);
    }
}
