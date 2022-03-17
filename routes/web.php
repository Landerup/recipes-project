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

Route::get('/', [App\Http\Controllers\RecipeController::class, 'index'])->name('homepage');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');

Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes');

Route::resource('/recipe', App\Http\Controllers\RecipeController::class);
