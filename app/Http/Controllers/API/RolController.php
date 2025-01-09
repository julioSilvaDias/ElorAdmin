<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Rol::orderBy('created_at')->get();
        return response()->json($rol);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
        ]);
        $rol = Rol::create($validatedData);
        $rol->save();

        return response()->json($rol);
    }


    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        return response()->json($rol);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
        ]);
        $rol = Rol::update($validatedData);

        return response()->json($rol);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return response()->json(['message' => 'Rol eliminado con exito']);
    }
}
