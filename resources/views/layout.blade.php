<!DOCTYPE html>
<html lang="en">
<!-- ESTA ES LA PLANTILLA ESTANDAR QUE SERÁ USADA PARA LAS OTRAS PLANTILLAS  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title> <!-- Contenido variable para cada pagina  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Header -->
    <header class="text-white p-3 py-2 px-3">
        <nav>
            <ul class="nav d-flex justify-content-between align-items-center">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategorias" aria-controls="offcanvasCategorias">Categorías</a>
                </li>
                <li><a href="/">
                    <img src="{{ asset('images/vibepointlogo.png') }}" alt="VibePoint logo" width="150">
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                @guest
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                @else
                    <a class="nav-link text-white" href="#">Mi perfil</a>
                    <img src="{{ asset('images/fotoperfil.jpeg') }}" class="rounded-circle ml-3" alt="Foto de perfil" width="40" height="40">
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