@foreach ($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
            <td>
                <a href="{{ route('reservations.create', ['id' => $book->id]) }}" class="btn btn-primary">Reservar</a>
                <button class="btn btn-secondary show-more" data-id="{{ $book->id }}" data-description="{{ $book->description }}" data-image="{{ $book->image }}" data-category="{{ $book->category }}">Mostrar más</button>
            </td>
    </tr>
@endforeach
