<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

Route::get('/profile', [App\Http\Controllers\RecipeController::class, 'getUserRecipe'])->name('profile');

Route::resource('/recipe', App\Http\Controllers\RecipeController::class);

Route::middleware('auth')->group(function() {
    Route::get('/recipe/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('create');
    Route::get('/recipe/edit', [App\Http\Controllers\RecipeController::class, 'edit'])->name('edit');
});

Route::put('/recipe/{id}', [App\Http\Controllers\RecipeController::class, 'update'])->name('update');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('Category');

Route::get('/category/{category_name}', [App\Http\Controllers\CategoryController::class, 'show'])->name('showCategory');