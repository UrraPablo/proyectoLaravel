<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('register',function(){
//     return '<h1>Registro de usuario</h1>';
// });

// Route::get('login', function () {
//     return '<h1>login usuario</h1>';
// });
// Route::get('logout', function () {
//     return '<h1>logout usuario</h1>';
// });

Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('post/create', [CategoryController::class, 'create'])->name('post.create');
Route::get('post/{id}', [CategoryController::class, 'show'])->name('post.show');
Route::get('post/edit/{id}', [CategoryController::class, 'edit'])->name('post.edit');

require __DIR__.'/auth.php';
