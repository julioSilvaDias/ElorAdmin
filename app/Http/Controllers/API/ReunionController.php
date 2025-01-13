<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reunion;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reunion = Reunion::orderBy('created_at')->get();
        return response()->json($reunion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comentario' => 'required|string',
            'estado' => 'nullable|string|in:pendiente,completado,cancelado',
            'fecha-hora-inicio' => 'required|date',
            'fecha-hora-fin' => 'required|date|after:fecha-hora-inicio',
            'emisor_id' => 'required|integer|exists:users,id',
            'receptor_id' => 'required|integer|exists:users,id',
        ]);

        $reunion = Reunion::create([
            'comentario' => $validatedData['comentario'],
            'estado' => $validatedData['estado'] ?? 'pendiente',
            'fecha-hora-inicio' => $validatedData['fecha-hora-inicio'],
            'fecha-hora-fin' => $validatedData['fecha-hora-fin'],
            'emisor_id' => $validatedData['emisor_id'],
            'receptor_id' => $validatedData['receptor_id'],
        ]);

        $reunion->save();
        return response()->json($reunion);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reunion $reunion)
    {
        return response()->json($reunion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->query('id');
        $estado = $request->query('estado');

        $request->validate([
            'estado' => 'required|in:aceptado,rechazado,pendiente',
        ]);

        $reunion = Reunion::find($id);

        if(!$reunion){
            return response()->json(['ERROR'=> 'Reunion no encontrada'],404);
        }

        $reunion->update([
            'estado'=> $estado,
        ]);

        return response()->json(['ATENCION!!!' => 'ESTADO ACTUALIZADO COM EXITO', $reunion]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reunion $reunion)
    {
        $reunion->delete();
        return response()->json(['message' => 'Reunion eliminado con exito']);
    }
}
