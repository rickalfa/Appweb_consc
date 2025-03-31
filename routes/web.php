<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/validar-credenciales', [UserController::class, 'validarCredenciales']);

