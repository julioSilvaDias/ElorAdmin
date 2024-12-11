<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(RolController::class)->group(function () {
    Route::get('/roles', 'index')->name('roles.index');
});
