<<<<<<< HEAD
@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title','VibePoint') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
<div class="container mt-4">
    <h2>{{ $category->name }}</h2>
    <button class="btn btnlogin mb-3">Nueva Vibe</button>
    <!-- Post destacado -->
    <div class="highlighted-post mb-4">
        <div class="card card-post card-highlighted">
            <div class="card-header card-post-header">
                <h6 class="card-author">{{ $highlightedPost->author->name }}</h6>
                <p class="card-date">{{ $highlightedPost->created_at->format('d M, Y') }}</p>
            </div>
            <div class="card-body card-post-body">
                <h5 class="card-title card-post-title">{{ $highlightedPost->title }}</h5>
                <p class="card-text card-post-text">{{ $highlightedPost->content }}</p>
            </div>
        </div>
    </div>

    <!-- Otros posts de la categoría -->
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <a href="{{ route('category.post.show', ['category' => $post->category->id, 'post' => $post->id]) }}" class="card-home">
                <div class="card card-post card-home">
                    <div class="card-header card-post-header">
                        <h6 class="card-author">{{ $post->author->name }}</h6>
                        <p class="card-date">{{ $post->created_at->format('d M, Y') }}</p>
                    </div>
                    <div class="card-body card-post-body">
                        <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                        <p class="card-text card-post-text">{{ $post->content }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
=======
@extends('layout')

@section('title', 'Post Details')

@section('contenido')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Categoría: {{ $post->category->name }}</p>
    <p>Autor: {{ $post->author->name }}</p>
@endsection
>>>>>>> 5de4ac1ccadd6cf73f94602877b6bfac195a2874
