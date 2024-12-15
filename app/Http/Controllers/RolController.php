<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rols = Rol::orderBy('id')->get();
        return view('rols.index',['rols' => $rols]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rols.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('rol.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        return view('rols.show',['rol'->$rol]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        return view('rols.edit', ['rol'=>$rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $rol->name = $request->name;
        $rol->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect()->route('rols.index');
    }
}
