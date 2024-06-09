<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // Mostrar todos los posts
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    // Mostrar un post específico en una categoría
    public function showPostInCategory($categoryId, $postId)
    {
        $category = Category::findOrFail($categoryId);
        $highlightedPost = Post::findOrFail($postId);
        $posts = $category->posts->where('id', '!=', $postId);

        return view('post.show', compact('category', 'highlightedPost', 'posts'));
    }

    // Mostrar el formulario de creación de un nuevo post
    public function create()
    {
        $categories = Category::all();
        return view('post.create', ['categories' => $categories]);
    }

    // Almacenar un nuevo post
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->author_id = auth()->id();

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imagePath = $image->store('images', 'public');
            $post->imagen = $imagePath;
        }

        $post->save();

        return redirect()->route('category.post.show', ['category' => $post->category_id, 'post' => $post->id]);
    }

    // Mostrar el formulario de edición de un post específico
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    // Actualizar un post existente
    public function update(Request $request, $id)
    {
        // Buscar el post a actualizar
        $post = Post::findOrFail($id);

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imagePath = $image->store('images', 'public');
            $post->imagen = $imagePath;
        }

        $post->save();

        return redirect()->route('category.post.show', ['category' => $post->category_id, 'post' => $post->id]);
    }

    // Eliminar un post específico
    public function destroy($id)
    {
        // Buscar el post a eliminar
        $post = Post::findOrFail($id);

        // Eliminar el post
        $post->delete();

        // Redirigir a la lista de posts
        return redirect()->route('posts.index');
    }

    // Buscar posts
    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('content', 'LIKE', "%{$query}%")
                     ->get();

        return view('post.search', compact('posts', 'query'));
    }
}
