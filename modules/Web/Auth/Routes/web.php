<?php

use Illuminate\Support\Facades\Route;
use Web\Auth\Http\Controllers\AuthController;

Route::prefix('auth')->group(function (){
    Route::get('/register' , [AuthController::class , 'registerPage'])->name('register');
    Route::post('/register' , [AuthController::class , 'register'])->name('register');
    Route::get('/login' , [AuthController::class , 'loginPage'])->name('login');
    Route::post('/login' , [AuthController::class , 'login'])->name('login');
    Route::post('/logout' , [AuthController::class , 'logOut'])->name('logout');
});
