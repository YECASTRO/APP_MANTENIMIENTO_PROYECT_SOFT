<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('equipos', EquipoController::class);
Route::resource('mantenimientos', MantenimientoController::class);
Route::resource('users', UserController::class);

