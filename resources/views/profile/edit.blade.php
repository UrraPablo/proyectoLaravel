@extends('layout')
<<<<<<< HEAD
@section('title', 'Mi perfil')
=======
@section('title','Editar Informacion')
>>>>>>> 5de4ac1ccadd6cf73f94602877b6bfac195a2874

@section('contenido')
<div class="container mt-5">
    <div class="row">
        <!-- Perfil de usuario -->
        <div class="col-md-4">
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
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header fs-5 headerLogin">
                    {{ __('Vibes de '.$user->name) }}
                </div>
                <div class="card-body">
                    <!-- Aquí irán los posts del usuario -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection