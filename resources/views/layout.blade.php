<!DOCTYPE html>
<html lang="en">
<!-- ESTA ES LA PLANTILLA ESTANDAR QUE SERÁ USADA PARA LAS OTRAS PLANTILLAS  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>@yield('title')</title> <!-- Contenido variable para cada pagina  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Header -->
    <header class="text-white p-3 py-2 px-3">

        <nav>
            <ul class="nav d-flex justify-content-between align-items-center">
                <li class="nav-item d-flex justify-content-start">
                    <a href="#" class="nav-link text-white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategorias" aria-controls="offcanvasCategorias">Categorías</a>
                    <form action="{{ route('search') }}" method="GET" class="search-form">
                        <input class="form-control me-2" type="search" name="query" placeholder="Buscar Vibe" aria-label="Buscar Vibe" required>
                        <button class="btn" type="submit">
                            <i class="fas fa-search text-white"></i> <!-- Icono de lupa en blanco -->
                        </button>
                    </form>
                </li>
              
                <li><a href="{{route('home')}}">
                        <img src="{{ asset('images/vibepointlogo.png') }}" alt="VibePoint logo" width="150">
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    @auth
<<<<<<< HEAD
                    <a class="nav-link text-white" href="{{ route('profile.index') }}">Mi Perfil</a>
                    <a class="nav-link text-white"> <form action="{{route('logout')}}" method="post">@csrf<button class="logout" type="submit">Logout</button></form></a>
                        
=======
                    <a class="nav-link text-white" href="{{ route('profile.edit') }}">Mi Perfil</a>
                    <a class="nav-link text-white">
                        <form action="{{route('logout')}}" method="post">@csrf<button class="logout" type="submit">Cerrar sesión</button></form>
                    </a>

>>>>>>> aae7b55c016d75115346002bf516bd1a38b97a03
                    @endauth
                    @guest

                    <a class="nav-link text-white" href="{{ route('login') }}">Ingresar</a>
                    <!-- aca va el <a> del login  -->
                    <a class="nav-link text-white" href="{{ route('register') }}">Registrarse</a>
                    @endguest

                </li>
            </ul>
        </nav>
    </header>


    <!-- Main Content -->
    <main class="container mt-4">
        @yield('contenido')
    </main>

    <!-- Footer -->
    <footer class="text-white mt-5 p-2">
        <div class="container-fluid">
            <div class="row align-items-center text-center">
                <div class="col-sm-7 d-flex justify-content-start text-start align-items-center">
                    <img src="{{ asset('images/vibepointlogo.png') }}" alt="VibePoint logo" width="150">
                    <span class="m-3">&copy; 2024 VibePoint.<br> Todos los derechos reservados.</span>
                </div>
                <div class="col text-start">
                    <span>Contactános: contacto@vibepoint.com.ar<br>Teléfono: +54 0299 547 8745</span><br>
                </div>
                <div class="col">
                    <span>Seguinos: @vibepoint</span>
                </div>
                <div class="col">
                    <span>Privacidad | Términos y Condiciones</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Offcanvas for Categories -->
    <div class="offcanvas offcanvas-start text-white" style="width:300px" tabindex="-1" id="offcanvasCategorias" aria-labelledby="offcanvasCategoriasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title h4" id="offcanvasCategoriasLabel">Categorías</h5>
            <button type="button" class="btn-close text-reset text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 ">
            <ul class="list-group list-group-flush">
                @foreach($categories as $category)
                <a class="list-group-item list-group-item-action h5 m-0 p-2" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                @endforeach
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>