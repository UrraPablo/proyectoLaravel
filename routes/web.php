<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeController::class);

Route::get('login', function () {
    return '<h1>login usuario</h1>';
});
Route::get('logout', function () {
    return '<h1>logout usuario</h1>';
});

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');