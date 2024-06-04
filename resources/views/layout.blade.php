<!DOCTYPE html>
<html lang="en">
<!-- ESTA ES LA PLANTILLA ESTANDAR QUE SERÁ USADA PARA LAS OTRAS PLANTILLAS  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title> <!-- Contenido variable para cada pagina  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Header -->
    <header class="text-white p-3 py-2 px-3">
        <nav>
            <ul class="nav d-flex justify-content-between align-items-center">
                <li class="nav-item">
                    <span>Categorías</span>
                </li>
                <li>
                    <img src="{{ asset('images/vibepointlogo.png') }}" alt="VibePoint logo" width="150">
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-white" href="#">Mi perfil</a>
                    <img src="{{ asset('images/fotoperfil.jpeg') }}" class="rounded-circle ml-3" alt="Foto de perfil" width="40" height="40">
                </li>
            </ul>
        </nav>
    </header>


    <!-- Main Content -->
    <main class="container mt-4">
        @yield('contenido')
    </main>

    <!-- Footer -->
  <footer class="text-white mt-5">
    <div class="container">
        <div class="row align-items-center justify-content-between text-center">
            <div class="col">
                <img src="{{ asset('images/vibepointlogo.png') }}" alt="VibePoint logo" width="150">
            </div>
            <div class="col">
                <span>&copy; 2024 VibePoint. Todos los derechos reservados.</span>
            </div>
            <div class="col">
                <span>Contáctanos: contacto@vibepoint.com.ar<br>Teléfono: +54 0299 547 8745</span>
            </div>
            <div class="col">
                <span>Síguenos: @vibepoint</span>
            </div>
            <div class="col">
                <span>Privacidad | Términos y Condiciones</span>
            </div>
        </div>
    </div>
</footer>
</body>

</html>