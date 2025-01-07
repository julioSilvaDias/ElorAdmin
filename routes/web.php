<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CicloUsuarioController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\HorarioController;

Route::controller(CicloUsuarioController::class)->group(function () {
    Route::resource('ciclo-usuario', CicloUsuarioController::class)->except(['edit', 'update', 'show']);
    Route::get('/ciclo-usuario/{id}', [CicloUsuarioController::class, 'show'])->name('ciclo_usuario.show');
    Route::get('/ciclo-usuario/{id}/edit', [CicloUsuarioController::class, 'edit'])->name('ciclo_usuario.edit');
    Route::put('/ciclo-usuario/{id}', [CicloUsuarioController::class, 'update'])->name('ciclo_usuario.update');
    Route::get('/ciclo-usuario/create', [CicloUsuarioController::class, 'create'])->name('ciclo_usuario.create');
    Route::get('/ciclo-usuario/destroy', [CicloUsuarioController::class, 'destroy'])->name('ciclo_usuario.destroy');
});

Route::controller(ReunionController::class)->group(function () {
    Route::get('/reunions', [ReunionController::class, 'index'])->name('reunions.index');
    Route::get('/reunions/create', [ReunionController::class, 'create'])->name('reunions.create');
    Route::post('/reunions', [ReunionController::class, 'store'])->name('reunions.store');
    Route::get('/reunions/{reunion}', [ReunionController::class, 'show'])->name('reunions.show');
    Route::get('/reunions/{reunion}/edit', [ReunionController::class, 'edit'])->name('reunions.edit');
    Route::put('/reunions/{reunion}', [ReunionController::class, 'update'])->name('reunions.update');
    Route::delete('/reunions/{reunion}', [ReunionController::class, 'destroy'])->name('reunions.destroy');
});

Route::controller(HorarioController::class)->group(function () {
    Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
    Route::get('/horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
    Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
    Route::get('/horarios/{horario}', [HorarioController::class, 'show'])->name('horarios.show');
    Route::get('/horarios/{horario}/edit', [HorarioController::class, 'edit'])->name('horarios.edit');
    Route::get('/horarios/{horario}', [HorarioController::class, 'update'])->name('horarios.update');
    Route::get('/horarios/{horario}', [HorarioController::class, 'destroy'])->name('horarios.destroy');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
