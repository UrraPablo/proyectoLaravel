@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title', 'VibePoint | Nueva vibe') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-4">Nueva Vibe</h1>
    
    <!-- Formulario para crear un nuevo post -->
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Token de seguridad para formularios en Laravel -->

        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label">Contenido:</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            @error('imagen')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoría:</label>
            <select class="form-select" id="category" name="category_id" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="d-grid">
            <button type="submit" class="btn btnlogin">Compartir Vibe</button>
        </div>
    </form>
</div>
@endsection
