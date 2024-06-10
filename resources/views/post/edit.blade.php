@extends('layout')
@section('title', 'Editar Post')

@section('contenido')
<div class="container mt-4">
    <h2>Editar Post</h2>
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            @if($post->imagen)
            <img src="{{ asset('storage/' . $post->imagen) }}" class="img-fluid mt-2" style="max-height: 150px;" alt="Imagen del post">
            @endif
        </div>
        <button type="submit" class="btn btnlogin">Guardar Cambios</button>
    </form>
</div>
@endsection
