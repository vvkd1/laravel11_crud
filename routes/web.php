<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome');
});


route::get('/products',[ProductController::class,'index'])->name('products.index');
route::get('/products/create',[ProductController::class,'create'])->name('products.create');
route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/delete/products/{id}',[ProductController::class , 'destroy'])->name('products.delete');
route::get('/edit/products/{id}',[ProductController::class , 'edit'])->name('products.edit');
Route::put('/update/products/{id}', [ProductController::class, 'update'])->name('products.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
