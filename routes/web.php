<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function (){
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}', 'update')->name('users.update');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy');
});


Route::controller(RolController::class)->group(function (){
    Route::get('/rols', 'index')->name('rols.index');
    Route::get('/rols/create', 'create')->name('rols.create');
    Route::post('/rols', 'store')->name('rols.store');
    Route::get('/rols/{rol}', 'show')->name('rols.show');
    Route::get('/rols/{rol}/edit', 'edit')->name('rols.edit');
    Route::put('/rols/{rol}', 'update')->name('rols.update');
    Route::delete('/rols/{rol}', 'destroy')->name('rols.destroy');
});