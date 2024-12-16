<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CicloUsuarioController;

Route::controller(CicloUsuarioController::class)->group(function () {
    Route::get('/ciclo-usuario', 'index')->name('ciclo_usuario.index');
    Route::post('/ciclo-usuario', 'store')->name('ciclo_usuario.store');
    Route::get('/ciclo-usuario/{id}', 'show')->name('ciclo_usuario.show');
    Route::put('/ciclo-usuario/{id}', 'update')->name('ciclo_usuario.update');
    Route::delete('/ciclo-usuario/{id}', 'destroy')->name('ciclo_usuario.destroy');
});

Route::get('/', function () {
    return view('welcome');
});
