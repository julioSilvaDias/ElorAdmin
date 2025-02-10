<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
* @OA\Info(title="API", version="1.0"),
* @OA\SecurityScheme(
*     in="header",
*     scheme="bearer",
*     bearerFormat="JWT",
*     securityScheme="bearerAuth",
*     type="http",
* ),
*/
class CicloController extends Controller
{
    /**
* @OA\Get(
*     path="/api/ciclo",
*     summary="Mostrar ciclos",
*     @OA\Response(
*         response=200,
*         description="Mostrar todos los ciclos."
*     ),
*     @OA\Response(
*         response="default",
*         description="Ha ocurrido un error."
*     )
* )
*/
    public function index()
    {
        $ciclos = Ciclo::orderBy('created_at')->get();
        return response()->json(['ciclos' => $ciclos], Response::HTTP_OK);
    }

    /**
     * Crear un nuevo ciclo.
     * 
     * @OA\Post(
     *     path="/api/ciclos",
     *     summary="Crear un nuevo ciclo",
     *     tags={"Ciclos"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre", "curso", "descripcion"},
     *             @OA\Property(property="nombre", type="string", example="Ciclo 1"),
     *             @OA\Property(property="curso", type="string", example="2024"),
     *             @OA\Property(property="descripcion", type="string", example="Descripción del ciclo")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ciclo creado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Recurso creado correctamente"),
     *             @OA\Property(property="data", ref="#/components/schemas/Ciclo")
     *         )
     *     )
     * )
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
     * Obtener un ciclo específico.
     * 
     * @OA\Get(
     *     path="/api/ciclos/{id}",
     *     summary="Obtener un ciclo por ID",
     *     tags={"Ciclos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del ciclo",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ciclo obtenido correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/Ciclo")
     *     )
     * )
     */
    public function show(Ciclo $ciclo)
    {
        return response()->json($ciclo, Response::HTTP_OK);
    }

    /**
     * Actualizar un ciclo existente.
     * 
     * @OA\Put(
     *     path="/api/ciclos/{id}",
     *     summary="Actualizar un ciclo",
     *     tags={"Ciclos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del ciclo",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre", "curso", "descripcion"},
     *             @OA\Property(property="nombre", type="string", example="Nuevo nombre"),
     *             @OA\Property(property="curso", type="string", example="2025"),
     *             @OA\Property(property="descripcion", type="string", example="Nueva descripción")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ciclo actualizado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Recurso actualizado correctamente"),
     *             @OA\Property(property="data", ref="#/components/schemas/Ciclo")
     *         )
     *     )
     * )
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        $ciclo->nombre = $request->nombre;
        $ciclo->curso = $request->curso;
        $ciclo->descripcion = $request->descripcion;
        $ciclo->save();

        return response()->json([
            'message' => 'Recurso actualizado correctamente',
            'data' => $ciclo
        ], Response::HTTP_OK);
    }

    /**
     * Eliminar un ciclo.
     * 
     * @OA\Delete(
     *     path="/api/ciclos/{id}",
     *     summary="Eliminar un ciclo",
     *     tags={"Ciclos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del ciclo",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ciclo eliminado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Recurso eliminado correctamente")
     *         )
     *     )
     * )
     */
    public function destroy(Ciclo $ciclo)
    {
        $ciclo->delete();
        return response()->json([
            'message' => 'Recurso eliminado correctamente'
        ], Response::HTTP_OK);
    }
}
