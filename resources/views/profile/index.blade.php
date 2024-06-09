@extends('layout')
@section('title','VibePoint | Mi Perfil')

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3 class="mb-2">Perfil de Usuario</h3>
                <div class="card" style="width: 18rem;">
                    <!-- <img src="..." class="card-img-top" alt="Imagen de Usuario" idi="imagenUsuario"> -->
                    <div class="card-body">
                      <h6 class="card-title">Nombre: {{$user->name}}</h6>
                      <h6 class="card-text">Email: {{$user->email}}</h6>
                      <a href="#" class="btn btnlogin">Editar Perfil</a>
                    </div>
                  </div>
            </div>
            <div class="col-8">
                <h3 class="mb-2">Vibes de {{$user->name}}</h3>
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