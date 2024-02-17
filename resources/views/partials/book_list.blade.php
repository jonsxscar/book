@foreach ($books as $book)
    <div class="book">
        <h2>{{ $book->title }}</h2>
        <p>Autor: {{ $book->author }}</p>
        <p>Descripción: {{ $book->description }}</p>
        <img src="{{ $book->image }}" alt="Imagen del libro">
    </div>
@endforeach
