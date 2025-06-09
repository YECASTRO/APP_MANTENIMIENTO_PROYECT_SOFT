<?php

use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::resource('equipos', EquipoController::class);

