@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Libros disponibles</h1>
        <select id="category">
            <option value="">Todas las categorías</option>
            <option value="Novela">Novela</option>
            <option value="Ciencia ficción">Ciencia ficción</option>
            <option value="Realismo mágico">Realismo mágico</option>
        </select>
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
                        <a href="{{ route('reservations.create', ['id' => $book->id]) }}" class="btn btn-primary">Reservar</a>
                        <button class="btn btn-secondary show-more" data-id="{{ $book->id }}" data-description="{{ $book->description }}" data-image="{{ $book->image }}" data-category="{{ $book->category }}">Mostrar más</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="bookModal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <h2 id="bookTitle"></h2> 
            <p id="bookAuthor"></p> 
            <p id="bookDescription"></p>
            <img id="bookImage" src="" alt="Imagen del libro">
            <p id="bookCategory"></p>
            <a id="bookReserve" href="" class="btn btn-primary">Reservar</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var modal = document.getElementById("bookModal");
            var span = document.getElementsByClassName("close")[0];

        $(document).on('click', '.show-more', function() {
            var title = $(this).parent().prev().prev().text(); 
            var author = $(this).parent().prev().text(); 
            var description = $(this).data('description');
            var image = $(this).data('image');
            var category = $(this).data('category');
            var id = $(this).data('id');

        $('#bookTitle').text(title); 
        $('#bookAuthor').text('Autor: ' + author); 
        $('#bookDescription').text('Descripción: ' + description);
        $('#bookImage').attr('src', image);
        $('#bookCategory').text('Categoría: ' + category);
        $('#bookReserve').attr('href', '/books/' + id + '/reserve');

        modal.style.display = "block";
        });

        span.onclick = function() {
        modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
            modal.style.display = "none";
            }
        }

        $('#category').on('change', function() {
            var category = $(this).val();
        $.ajax({
            url: '/filter',
            data: {category: category},
            success: function(data) {
                $('#book-list').html(data);
            }
        });
        })
});

    </script>
@endsection

@push('styles')
<style>
/* Aquí va el código CSS del modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>
@endpush