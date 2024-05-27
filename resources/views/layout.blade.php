<!DOCTYPE html>
<html lang="en">
    <!-- ESTA ES LA PLANTILLA ESTANDAR QUE SERÁ USADA PARA LAS OTRAS PLANTILLAS  -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title> <!-- Contenido variable para cada pagina  -->
    @vite('resources/css/app.css')

</head>
<body>
    <!--HEADER -->
    <header>
        <nav class="flex-container" id='headerNav'>
            <div class="header"> <img src="{{asset('images/ialogo.jpg')}}" alt="Logo de la Pagina"></div>
            <div class="header">IA News</div>
            <div class="header">
                <ul class='lista'>
                    <li class='item'>Features1</li>
                    <li class='item'>Features2</li>
                    <li class='item'>Features3</li>
                </ul>
            </div>
            <div class="header"><button class="button">Sign In</button></div>
        </nav>
    </header>
    <!--CONTENIDO  -->
     @yield('contenido') <!-- para mostrar contenido variable segun cada plantilla  -->

    <!--FOOTER -->
    <footer>
        <div class="flex-container" id='footerNav'>
            <div class="footer">contactos</div>
            <div class="footer">about us</div>
            <div class="footer">ubicacion</div>
        </div>
    </footer>
    
</body>
</html>