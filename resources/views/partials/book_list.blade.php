<table id="book-list" class="table" style="table-layout: fixed; width: 600px;">
            <thead>
                <tr>
                    <th style="width: 40%;">Título</th>
                    <th style="width: 40%;">Autor</th>
                    <th style="width: 40%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td style="text-align: center;">{{ $book->title }}</td>
                    <td style="text-align: center;">{{ $book->author }}</td>
                    <td>
                        <button class="btn btn-primary reserve-button" style="background: #313139; color: white;" data-id="{{ $book->id }}">Reservar</button>
                        <button class="btn btn-secondary show-more" data-id="{{ $book->id }}" data-description="{{ $book->description }}" data-image="{{ $book->image }}" data-category="{{ $book->category }}">Mostrar más</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


