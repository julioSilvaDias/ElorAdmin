<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Asignatura_Usuario_HorarioController;
use App\Http\Controllers\API\AsignaturaController;
use App\Http\Controllers\API\CicloController;
use App\Http\Controllers\API\CicloUsuarioController;
use App\Http\Controllers\API\HorarioController;
use App\Http\Controllers\API\RolController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ReunionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('asignatura-usuario-horario', Asignatura_Usuario_HorarioController::class);
Route::apiResource('asignatura', AsignaturaController::class);
Route::apiResource('ciclo', CicloController::class);
Route::apiResource('ciclo-usuario', CicloUsuarioController::class);


Route::apiResource('rol', RolController::class);
Route::apiResource('reunion', ReunionController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('horario', HorarioController::class);