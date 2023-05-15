<?php

use Illuminate\Support\Facades\Route;
use Web\Common\Http\Controllers\CommonController;

Route::prefix('/')->group(function (){
   Route::get('/' , [CommonController::class , 'index']);
});
