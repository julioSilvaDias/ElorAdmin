<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\Asignatura_Usuario_HorarioController;

Route::permanentRedirect('/', '/home');

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'asignaturas' => AsignaturaController::class,
        'ciclos' => CicloController::class,
        'asignatura_Usuario_Horarios' => Asignatura_Usuario_HorarioController::class,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');