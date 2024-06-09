@extends('layout')

@section('title', 'VibePoint | ' . $category->name)

@section('contenido')
<div class="container mt-4">
    <h2>{{ $category->name }}</h2>
    <a href="{{ route('post.create') }}" class="btn btnlogin mb-3">Nueva Vibe</a>

    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card card-post">
                <div class="card-header card-post-header">
                    <h6 class="card-author">{{ $post->author->name }}</h6>
                    <p class="card-date">{{ $post->created_at->format('d M, Y') }}</p>
                </div>
                <div class="card-body card-post-body">
                    <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                    @if($post->imagen)
                    <img src="{{ asset('storage/' . $post->imagen) }}" class="card-img-top" alt="Imagen del post">
                    @endif
                    <p class="card-text card-post-text">{{ $post->content }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
