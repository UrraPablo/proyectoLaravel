<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::get('/category/{category}/post/{post}', [PostController::class, 'showPostInCategory'])->name('category.post.show');
Route::get('/search', [PostController::class, 'search'])->name('search');


require __DIR__.'/auth.php';
