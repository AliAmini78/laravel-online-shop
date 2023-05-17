<?php


use Illuminate\Support\Facades\Route;
use Web\Products\Http\Controllers\CartController;
use Web\Products\Http\Controllers\ProductController;

Route::prefix('admin')->middleware(['auth:web' ,'is.admin'])->group(function (){
   Route::resource('product', ProductController::class);
});

Route::get('products/list' ,[ProductController::class , 'frontProductList'] )->name('product.home_list');

Route::prefix('cart')->group(function (){
   Route::get('list' , [CartController::class , "showCart"])->name('cart.list');
   Route::post('add/{product}' , [CartController::class , "addToCart"])->name('cart.add');
   Route::post('remove/{product}' , [CartController::class , "removeFromCart"])->name('cart.remove');
});
