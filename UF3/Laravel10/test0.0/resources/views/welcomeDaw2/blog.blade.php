@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Vienvenido al Blog</h1>
    @foreach ($posts as $post)
    <p>Titulo: {{ $post['title'] }}</p>
    @endforeach
    {{-- @dump($posts) --}}
@endsection
