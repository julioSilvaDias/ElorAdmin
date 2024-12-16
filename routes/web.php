<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CicloUsuarioController;

Route::controller(CicloUsuarioController::class)->group(function () {
    Route::resource('ciclo-usuario', CicloUsuarioController::class);
    Route::get('/ciclo-usuario', [CicloUsuarioController::class, 'index'])->name('ciclo_usuario.index'); // Mostrar todos los registros
    Route::post('/ciclo-usuario', [CicloUsuarioController::class, 'store'])->name('ciclo_usuario.store'); // Crear un nuevo registro
    Route::get('/ciclo-usuario/{id}', 'show')->name('ciclo_usuario.show'); // Obtener un registro específico
    Route::put('/ciclo-usuario/{id}', 'update')->name('ciclo_usuario.update'); // Actualizar un registro
    Route::delete('/ciclo-usuario/{id}', 'destroy')->name('ciclo_usuario.destroy'); // Eliminar un registro
    Route::get('/ciclo-usuario/create', [CicloUsuarioController::class, 'create'])->name('ciclo_usuario.create'); // Mostrar formulario de creación
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
