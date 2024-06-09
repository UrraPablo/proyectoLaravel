<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class PostController extends Controller
{
    // Método para mostrar todos los posts
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function showPostInCategory($categoryId, $postId)
    {
        $category = Category::findOrFail($categoryId);
        $highlightedPost = Post::findOrFail($postId);
        $posts = $category->posts->where('id', '!=', $postId);

        return view('post.show', compact('category', 'highlightedPost', 'posts'));
    }

    // Método para mostrar el formulario de creación de un nuevo post
    public function create()
    {
        $categories = Category::all();
        return view('post.create', ['categories' => $categories]);
    }

    // Método para almacenar un nuevo post
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Si la validación falla, redirigir de vuelta con los errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear un nuevo post
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->author_id = auth()->user()->id;
        $post->save();

        // Redirigir a la página del nuevo post
        return redirect()->route('post.show', ['id' => $post->id]);
    }

    // Método para mostrar el formulario de edición de un post específico
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    // Método para actualizar un post existente
    public function update(Request $request, $id)
    {
        // Buscar el post a actualizar
        $post = Post::findOrFail($id);

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Si la validación falla, redirigir de vuelta con los errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualizar los datos del post
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->save();

        // Redirigir a la página del post actualizado
        return redirect()->route('post.show', ['id' => $post->id]);
    }

    // Método para eliminar un post específico
    public function destroy($id)
    {
        // Buscar el post a eliminar
        $post = Post::findOrFail($id);

        // Eliminar el post
        $post->delete();

        // Redirigir a la lista de posts
        return redirect()->route('posts.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('content', 'LIKE', "%{$query}%")
                     ->get();

        return view('post.search', compact('posts', 'query'));
    }
}
