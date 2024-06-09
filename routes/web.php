<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
<<<<<<< HEAD
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
=======
use App\Http\Controllers\PostController;
use App\Models\Post;

>>>>>>> 5de4ac1ccadd6cf73f94602877b6bfac195a2874
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

<<<<<<< HEAD
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::get('/category/{category}/post/{post}', [PostController::class, 'showPostInCategory'])->name('category.post.show');
Route::get('/search', [PostController::class, 'search'])->name('search');


=======
Route::middleware('auth')->group(function () {
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});
>>>>>>> 5de4ac1ccadd6cf73f94602877b6bfac195a2874
require __DIR__.'/auth.php';
