@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title','Home') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
    <div>
        <h1>HOLA ESTO ES LA PAGINA HOME</h1>
        <div class="bg-blue-500 text-white p-4">
    Esto debería tener un fondo azul y texto blanco.
</div>
    </div>   <!-- asignacion dinamica del contenido segun la pagina en particular -->

@endsection
    

