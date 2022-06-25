<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;



Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::post('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');
Route::post('/category/delete',[CategoryController::class,'delete'])->name('category.delete');

Route::get('/',[TodoController::class,'index'])->name('todo.index');
Route::post('/create',[TodoController::class,'create'])->name('todo.create');