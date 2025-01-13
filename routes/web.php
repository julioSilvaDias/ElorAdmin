<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\Asignatura_Usuario_HorarioController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;

use App\Http\Controllers\CicloUsuarioController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\HorarioController;


Route::controller(CicloUsuarioController::class)->group(function () {
    Route::resource('/ciclo-usuario', CicloUsuarioController::class)->except(['edit', 'update', 'show']);
    Route::get('/ciclo-usuario', [CicloUsuarioController::class, 'index'])->name('ciclo-usuario.index');
    Route::get('/ciclo-usuario/{id}', [CicloUsuarioController::class, 'show'])->name('ciclo_usuario.show');
    Route::get('/ciclo-usuario/{id}/edit', [CicloUsuarioController::class, 'edit'])->name('ciclo_usuario.edit');
    Route::put('/ciclo-usuario/{id}', [CicloUsuarioController::class, 'update'])->name('ciclo_usuario.update');
    Route::get('/ciclo-usuario/create', [CicloUsuarioController::class, 'create'])->name('ciclo_usuario.create');
    Route::delete('/ciclo-usuario/{id}', [CicloUsuarioController::class, 'destroy'])->name('ciclo_usuario.destroy');
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
Route::permanentRedirect('/', '/home');

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'asignaturas' => AsignaturaController::class,
        'ciclos' => CicloController::class,
        'asignatura_Usuario_Horarios' => Asignatura_Usuario_HorarioController::class,
    ]);
});


Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::middleware(['checkAdminCreateUser'])->post('/users', 'store')->name('users.store');
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}', 'update')->name('users.update');
    Route::middleware(['checkUserMiddleware'])->delete('/users/{user}', 'destroy')->name('users.destroy');
});



Route::middleware(['protectDefaultRoles'])->delete('/rols/{rol}', [RolController::class, 'destroy'])->name('rols.destroy');
Route::resources([
    'rols' => RolController::class,
], ['except' => ['destroy']]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

