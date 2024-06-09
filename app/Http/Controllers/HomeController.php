<?php

namespace App\Http\Controllers;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los posts
        $posts = Post::all();

        // Pasar los posts a la vista
        return view('home', ['posts' => $posts]);
    }
}
