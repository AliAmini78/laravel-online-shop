<?php


use Illuminate\Support\Facades\Route;
use Web\User\Http\Controllers\UserController;

Route::prefix('user')->group(function (){
   Route::get('index' , [UserController::class , 'index']);
});
