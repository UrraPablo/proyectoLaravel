@extends('layout')

@section('title', 'Post Details')

@section('contenido')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Categoría: {{ $post->category->name }}</p>
    <p>Autor: {{ $post->author->name }}</p>
@endsection