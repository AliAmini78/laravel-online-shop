<?php


use Illuminate\Support\Facades\Route;
use Web\Products\Http\Controllers\ProductController;

Route::prefix('admin')->middleware(['auth:web' ,'is.admin'])->group(function (){
   Route::resource('product', ProductController::class);
});
