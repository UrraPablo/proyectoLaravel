<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Definicion de metodos para la clase categoria
    // Método para mostrar todas las categorías
    public function getIndex()
    {
        $categories = Category::all(); // Obtener todas las categorías desde la base de datos
        return view('category.index', ['categories' => $categories]); // Pasar las categorías a la vista
    }

    // Método para mostrar los detalles de una categoría específica
    public function getShow($id)
    {
        $category = Category::findOrFail($id); // Obtener la categoría específica por su ID
        return view('category.show', ['category' => $category]); // Pasar la categoría a la vista
    }
}// fin clase controller category
