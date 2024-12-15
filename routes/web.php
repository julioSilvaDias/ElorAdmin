<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\Asignatura_Usuario_HorarioController;

Route::permanentRedirect('/', '/asignaturas');

Route::resources([
    'asignaturas' => AsignaturaController::class,
    'ciclos' => CicloController::class,
    'asignatura_Usuario_Horarios' => Asignatura_Usuario_HorarioController::class,
]);

Route::controller(AsignaturaController::class)->group(function () {
    Route::get('/asignaturas', 'index')->name('asignaturas.index');
});

Route::controller(Asignatura_Usuario_HorarioController::class)->group(function () {
    Route::get('/asignatura_Usuario_Horarios', 'index')->name('asignatura_Usuario_Horarios.index');
});

Route::controller(CicloController::class)->group(function () {
    Route::get('/ciclos', 'index')->name('ciclos.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
