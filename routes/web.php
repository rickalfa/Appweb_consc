<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\VerificationController;

Route::get('/', function () {
    return view('welcome');
});



Route::post('/storeuser', [UserController::class, 'store'])->name('register.store');

Route::get('/registeruser', [UserController::class, 'create'])->name('user.register');

Route::get('/login',[UserController::class, 'login'])->name('login');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/validar-credenciales', [AuthController::class, 'login'])->name('validar-credenciales');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile/{username}', [AuthController::class, 'show'])->name('profile.show');
    

    /**
     * Rutas para la verificacion de correo
     */

     Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
     Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
     Route::post('email/verification-notification', [VerificationController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.send');


});