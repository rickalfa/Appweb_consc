<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});



Route::post('/storeuser', [UserController::class, 'store'])->name('register.store');

Route::get('/registeruser', [UserController::class, 'create'])->name('user.register');

Route::get('/login',[UserController::class, 'login'])->name('user.login');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/validar-credenciales', [AuthController::class, 'login'])->name('validar-credenciales');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');