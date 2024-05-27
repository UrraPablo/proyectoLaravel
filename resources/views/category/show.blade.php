@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title','Show') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
   <!-- asignacion dinamica del contenido segun la pagina en particular -->
    <h1>Vista detalle del post {{$id}}</h1>

@endsection
