@foreach ($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>
            <a href="/reservations/{{ $book->id }}" class="btn btn-primary">Reservar</a>
            <button class="btn btn-secondary show-more" data-description="{{ $book->description }}" data-image="{{ $book->image }}" data-category="{{ $book->category }}">Mostrar más</button>
        </td>
    </tr>
@endforeach
