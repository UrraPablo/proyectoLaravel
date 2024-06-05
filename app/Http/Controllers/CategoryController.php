<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Definicion de metodos para la clase categoria
    // Método para mostrar todas las categorías
    public function getIndex($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $posts = $category->posts; // Obtener todos los posts asociados a esta categoría
        return view('category.index', ['category' => $category, 'posts' => $posts]);
    }

    // Método para mostrar los detalles de una categoría específica
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts()->get(); // Obtener los posts asociados a esta categoría
        return view('category.show', ['category' => $category, 'posts' => $posts]);
    }
}// fin clase controller category
