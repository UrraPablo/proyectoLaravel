@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title', 'VibePoint | '.$category->name) <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
<div class="container mt-4">
    <h2>{{ $category->name }}</h2>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card card-post">
                <div class="card-header card-post-header">
                    <!-- Nombre del autor -->
                    <h6 class="card-author">{{ $post->author->name }}</h6>
                    <!-- Fecha de creación -->
                    <p class="card-date">{{ $post->created_at->format('d M, Y') }}</p>
                </div>
                <div class="card-body card-post-body">
                    <!-- Título del post -->
                    <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                    <!-- Contenido del post -->
                    <p class="card-text card-post-text">{{ $post->content }}</p>
                    <!-- Puedes agregar más detalles del post aquí -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection