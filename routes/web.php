<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('blog-item/{id}',[App\Http\Controllers\FrontController::class, 'blogItem'])->name('blog.item');

Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.index');