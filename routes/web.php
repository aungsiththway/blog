<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchController;
Route::get('/search', [SearchController::class, 'index'])
    ->name('posts.search');

Route::get('/',[App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('blog-item/{id}',[App\Http\Controllers\FrontController::class, 'blogItem'])->name('blog.item');
Route::get('posts-category/{category_id}',[App\Http\Controllers\FrontController::class, 'postsCategory'])->name('posts.category');

//Route Group
Route::group(['middleware'=>['auth','admin_or_staff'],'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
