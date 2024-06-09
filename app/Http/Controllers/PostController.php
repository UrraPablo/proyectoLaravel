<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // Método para mostrar todos los posts
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    // Método para mostrar los detalles de un post específico
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }

    // Método para mostrar el formulario de creación de un nuevo post
    public function create()
    {
        return view('post.create');
    }

    // Método para editar un post específico
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }

    // Método para almacenar un nuevo post
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // Agrega otras reglas de validación según tus necesidades
        ]);

        // Si la validación falla, redirigir de vuelta con los errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear un nuevo post
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        // Asignar el autor del post (por ejemplo, el usuario actual)
        $post->author_id = auth()->user()->id;
        $post->save();

        // Redirigir a alguna vista de confirmación o a la página del nuevo post
        return redirect()->route('posts.show', ['id' => $post->id]);
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
            // Agrega otras reglas de validación según tus necesidades
        ]);

        // Si la validación falla, redirigir de vuelta con los errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualizar los datos del post
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // Redirigir a alguna vista de confirmación o a la página del post actualizado
        return redirect()->route('posts.show', ['id' => $post->id]);
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
}