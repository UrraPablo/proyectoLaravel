@extends('layout')
@section('title','VibePoint | Mi Perfil')

@section('contenido')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-4 pe-md-5"> <!-- Añadido pe-md-5 para margen en el lado derecho -->
            <h3 class="mb-2">Perfil de Usuario</h3>
            <div class="card shadow-lg" style="width: 100%;"> <!-- Cambiado a width: 100% para que ocupe toda la columna -->
                <!-- Imagen de Usuario -->
                @if($user->imagen)
                <img src="{{ asset('storage/' . $user->imagen) }}" class="card-img-top img-fluid" style="max-height: 150px; object-fit: cover;" alt="Imagen de Usuario">
                @endif
                <div class="card-body">
                    <h6 class="card-title">Nombre: {{$user->name}}</h6>
                    <h6 class="card-text">Email: {{$user->email}}</h6>
                    <a href="{{ route('profile.edit') }}" class="btn btnlogin">Editar Perfil</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="card-header card fs-5 headerLogin">Vibes de {{$user->name}}</h3>
                <a href="{{ route('post.create') }}" class="btn btnlogin">Nueva Vibe</a>
            </div>
            @if($posts->isEmpty())
                <h5 class="mb-2 text-danger">No hay post disponibles</h5>
            @else
                @foreach ($posts as $post)
                <!-- Contenedor para los posts -->
                <div class="col-md-8">
                    <div class="shadow-lg mb-4">
                        <div class="card-body">
                            <a href="{{ route('category.post.show', ['category' => $post->category->id, 'post' => $post->id]) }}" class="card-home">
                                <div class="card card-post card-home mb-3">
                                    <div class="card-header card-post-header">
                                        <!-- Fecha de creación -->
                                        <p class="card-date">{{ $post->created_at }}</p>
                                        <span class="card-category position-absolute top-0 end-0 p-1 m-1 fw-bold text-white">{{$post->category->name}}</span>
                                    </div>
                                    <div class="card-body card-post-body">
                                        <!-- Título del post -->
                                        <h5 class="card-title card-post-title">{{ $post->title }}</h5>
                                        <!-- Imagen del post -->
                                        @if($post->imagen)
                                        <img src="{{ asset('storage/' . $post->imagen) }}" class="img-fluid mb-3" style="max-height: 150px; object-fit: cover;" alt="Imagen del post">
                                        @endif
                                        <!-- Contenido del post -->
                                        <p class="card-text card-post-text">{{ $post->content }}</p>
                                        <!-- Botones de Editar y Eliminar -->
                                        <div class="d-flex justify-content-end mt-3">
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$post->id}}" data-post-id="{{ $post->id }}">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal de Confirmación de Eliminación -->
                <div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{$post->id}}">Confirmar Eliminación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro de que deseas eliminar este post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form id="deleteForm{{$post->id}}" action="{{ route('post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModals = document.querySelectorAll('[id^="deleteModal"]');
        deleteModals.forEach(function(modal) {
            modal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var postId = button.getAttribute('data-post-id');
                var form = document.getElementById('deleteForm' + postId);
                form.action = '/post/' + postId;
            });
        });
    });
</script>
@endsection