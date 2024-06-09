@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title','Editar vibe') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
     <!-- asignacion dinamica del contenido segun la pagina en particular => una opcion para el echo es usar {{}} -->
    <h1>Modificar post {{$id}}</h1>

@endsection
