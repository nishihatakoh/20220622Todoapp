<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::post('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');

