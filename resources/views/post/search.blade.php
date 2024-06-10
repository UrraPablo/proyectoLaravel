@extends('layout')

@section('title', 'VibePoint | Buscar
')

@section('contenido')
<div class="container mt-4">
    <h3>Vibes sobre "{{ $query }}"</h3>
    <div class="row">
    @if($posts->isEmpty())
        <div class="col-md-12 mb-4">
            <p>Parece que nadie compartió una Vibe sobre "{{$query}}".</p>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
        </div>
    @else
        @foreach($posts as $post)
            <div class="col-md-12 mb-4">
                <a href="{{ route('category.post.show', ['category' => $post->category->id, 'post' => $post->id]) }}" class="card-home">
                    <div class="card card-post card-home">
                        <div class="card-header card-post-header">
                            <h6 class="card-author">{{ $post->author->name }}</h6>
                            <p class="card-date">{{ $post->created_at->format('d M, Y') }}</p>
                            <span class="card-category position-absolute top-0 end-0 p-1 m-2 fw-bold text-white">{{$post->category->name}}</span>
                        </div>
                        <div class="card-body card-post-body">
                            <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                            <p class="card-text card-post-text">{{ $post->content }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
    </div>
</div>
@endsection