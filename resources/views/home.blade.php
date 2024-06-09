@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title','VibePoint') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
   
<div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
        <a href="{{ route('category.post.show', ['category' => $post->category->id, 'post' => $post->id]) }}" class="card-home">
            <div class="card card-post card-home">
                <div class="card-header card-post-header">
                    <!-- Nombre del autor -->
                    <h6 class="card-author">{{ $post->author->name }}</h6>
                    <!-- Fecha de creación -->
                    <p class="card-date">{{ $post->created_at->format('d M, Y') }}</p>
                    <span class="card-category position-absolute top-0 end-0 p-1 m-2 fw-bold text-white">{{$post->category->name}}</span>
                </div>
                <div class="card-body card-post-body">
                    <!-- Título del post -->
                    <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                    <!-- Contenido del post -->
                    <p class="card-text card-post-text">{{ $post->content }}</p>
                    <!-- Puedes agregar más detalles del post aquí -->
                </div>
            </div></a>
        </div>
        @endforeach
    </div>
@endsection
    

