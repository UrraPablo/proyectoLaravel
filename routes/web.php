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

// forma para enlazar la ruta con el controlador de la clase category 
Route::get('category',[CategoryController::class,'getIndex']);

/** EJEMPLO DE AGRUPAMIENTO DE METODOS DE UN MISMO CONTROLLER */

// Route::get('category/show/{id}',[CategoryController::class,'getShow']);
// Route::get('category/create',[CategoryController::class,'getCreate']);
// Route::get('category/edit/{id}',[CategoryController::class,'getEdit']);
Route::controller(CategoryController::class)->group(function(){
    Route::get('category/create','getCreate');
    Route::get('category/show/{id}','getShow');
    Route::get('category/edit/{id}','getEdit');
});