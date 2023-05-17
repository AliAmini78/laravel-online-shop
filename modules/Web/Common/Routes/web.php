<?php

use Illuminate\Support\Facades\Route;
use Web\Common\Http\Controllers\HomeController;
use Web\Common\Http\Controllers\PanelController;

Route::prefix('/')->group(function (){
   Route::get('/' , [HomeController::class , 'index'])->name('home');
});
Route::prefix('/admin')->middleware(["auth:web",'is.admin'])->group(function (){
    Route::get('/' , [PanelController::class , 'index'])->name('panel');
});
