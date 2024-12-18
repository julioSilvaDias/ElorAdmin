<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CicloUsuarioController;

Route::controller(CicloUsuarioController::class)->group(function () {
    Route::resource('ciclo-usuario', CicloUsuarioController::class)->except(['edit', 'update', 'show']);
    Route::get('/ciclo-usuario/{id}', [CicloUsuarioController::class, 'show'])->name('ciclo_usuario.show');
    Route::get('/ciclo-usuario/{id}/edit', [CicloUsuarioController::class, 'edit'])->name('ciclo_usuario.edit');
    Route::put('/ciclo-usuario/{id}', [CicloUsuarioController::class, 'update'])->name('ciclo_usuario.update');
    Route::get('/ciclo-usuario/create', [CicloUsuarioController::class, 'create'])->name('ciclo_usuario.create');
    Route::get('/ciclo-usuario/destroy', [CicloUsuarioController::class, 'destroy'])->name('ciclo_usuario.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
