@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Libros disponibles</h1>
        <select id="category">
            <option value="">Todas las categorías</option>
            <option value="Novela">Novela</option>
            <option value="Ciencia ficción">Ciencia ficción</option>
            <option value="Realismo mágico">Realismo mágico</option>
            <!-- Agrega aquí las demás categorías -->
        </select>
        <div id="book-list">
            @foreach ($books as $book)
                <div class="book">
                    <h2>{{ $book->title }}</h2>
                    <p>Autor: {{ $book->author }}</p>
                    <p>Descripción: {{ $book->description }}</p>
                    <img src="{{ $book->image }}" alt="Imagen del libro">
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category = $(this).val();
                $.ajax({
                    url: '/filter',
                    data: {category: category},
                    success: function(data) {
                        $('#book-list').html(data);
                    }
                });
            });
        });
    </script>
@endsection



<!-- @extends('layouts.app')

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
@endsection -->