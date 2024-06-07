@extends('layout') <!-- hace referencia a la plantilla estandar -->
@section('title','Index') <!-- asignacion dinamica del titulo segun la pagina en particular -->

@section('contenido')
     <!-- asignacion dinamica del contenido segun la pagina en particular -->
    <h1>Listado de categorias</h1>
    <ul>
       @foreach ($category  as $item)
        <li>
            <a href="{{route('category.show',$item->id)}}">{{$item->name()}}</a>
        </li>
       @endforeach
    </ul>

@endsection
