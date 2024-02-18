<table id="book-list" class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                    <td>
                        <button class="btn btn-primary reserve-button" data-id="{{ $book->id }}">Reservar</button>
                        <button class="btn btn-secondary show-more" data-id="{{ $book->id }}" data-description="{{ $book->description }}" data-image="{{ $book->image }}" data-category="{{ $book->category }}">Mostrar más</button>
                    </td>
            </tr>
        @endforeach
    </tbody>
<script>
$(document).ready(function() {
    $(document).on('click', '.reserve-button', function() {
        var id = $(this).data('id');
        window.location.href = '/books/' + id + '/reserve';
    });
});
</script>
