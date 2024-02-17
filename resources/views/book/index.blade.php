@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Libros disponibles</h1>
        @foreach ($books as $book)
            <div>
                <h2>{{ $book->title }}</h2>
                <p>Autor: {{ $book->author }}</p>
                <p>Descripción: {{ $book->description }}</p>
                <img src="{{ $book->image }}" alt="Imagen del libro">
            </div>
        @endforeach
    </div>
@endsection
