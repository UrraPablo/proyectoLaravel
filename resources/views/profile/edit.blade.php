@extends('layout')
@section('title', 'Mi perfil')

@section('contenido')

    <div class="row">
        <!-- Perfil de usuario -->
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header fs-5 headerLogin">
                    {{ __('Informacion de usuario') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update', $user) }}" method="post">
                        @csrf
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                        </div>
                        
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        
                        <!-- Confirmar Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirmar contraseña') }}</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btnlogin">
                                {{ __('Actualizar datos') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Contenedor para los posts -->
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header fs-5 headerLogin">
                    {{ __('Vibes de '.$user->name) }}
                </div>
                @foreach ($posts as $post)
                <a href="{{ route('category.post.show', ['category' => $post->category->id, 'post' => $post->id]) }}" class="card-home">
                <div class="card card-post card-home">
                    <div class="card-header card-post-header">
                        <!-- Fecha de creación -->
                        <p class="card-date">{{ $post->created_at }}</p>
                        <span class="card-category position-absolute top-0 end-0 p-1 m-1 fw-bold text-white">{{$post->category->name}}</span>
                    </div>
                    <div class="card-body card-post-body">
                        <!-- Título del post -->
                        <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                        <!-- Contenido del post -->
                        <p class="card-text card-post-text">{{ $post->content }}</p>
                        <!-- Puedes agregar más detalles del post aquí -->
                    </div>
                </a>
                    
                @endforeach
            </div>
        </div>
    </div>

@endsection