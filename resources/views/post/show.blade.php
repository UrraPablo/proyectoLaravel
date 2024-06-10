@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title','VibePoint') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
<div class="container mt-4">
    <h2>{{ $category->name }}</h2>
    <a href="{{ route('post.create') }}" class="btn btnlogin mb-3">Nueva Vibe</a>
    <!-- Post destacado -->
    <div class="highlighted-post mb-4">
        <div class="card card-post card-highlighted">
            <div class="card-header card-post-header">
                <h6 class="card-author">{{ $highlightedPost->author->name }}</h6>
                <p class="card-date">{{ $highlightedPost->created_at->format('d M, Y') }}</p>
            </div>
            <div class="card-body card-post-body">
                <h5 class="card-title card-post-title">{{ $highlightedPost->title }}</h5>
                <!-- Imagen del post destacado -->
                @if($highlightedPost->imagen)
                <img src="{{ asset('storage/' . $highlightedPost->imagen) }}" class="img-fluid mb-3" style="max-height: 400px; object-fit: cover;" alt="Imagen del post">
                @endif
                <p class="card-text card-post-text">{{ $highlightedPost->content }}</p>
            </div>
        </div>
    </div>

    <!-- Otros posts de la categoría -->
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-12 mb-4">
            <a href="{{ route('category.post.show', ['category' => $post->category->id, 'post' => $post->id]) }}" class="card-home">
                <div class="card card-post card-home">
                    <div class="card-header card-post-header">
                        <h6 class="card-author">{{ $post->author->name }}</h6>
                        <p class="card-date">{{ $post->created_at->format('d M, Y') }}</p>
                    </div>
                    <div class="card-body card-post-body">
                        <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                        <!-- Imagen del post -->
                        @if($post->imagen)
                        <img src="{{ asset('storage/' . $post->imagen) }}" class="img-fluid card-img-top mb-3" alt="Imagen del post">
                        @endif
                        <p class="card-text card-post-text">{{ $post->content }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
