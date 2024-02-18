@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; flex-direction: column; align-items: center;">
        <h1 style="text-align: center;">Libros disponibles</h1>
        <button onclick="window.location.href='{{ route('dashboard') }}'" class="btn btn-primary" style="margin-bottom: 20px; background: #313139; color: white;">Datos de usuario</button>
        <select id="category">
            <option value="">Todas las categorías</option>
            <option value="Novela">Novela</option>
            <option value="Ciencia ficción">Ciencia ficción</option>
            <option value="Realismo mágico">Realismo mágico</option>
        </select>
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
    </div>
    <div id="bookModal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <h2 id="bookTitle"></h2> 
            <p id="bookAuthor"></p> 
            <p id="bookDescription"></p>
            <p id="bookCategory"></p>
            <div style="display: flex; align-items: stretch; flex-direction: column">
            <img id="bookImage" src="" alt="Imagen del libro" style="max-width: 300px;">
            <button id="bookReserve" class="btn btn-primary" style="background: #313139; color: white;" >Reservar</button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var modal = document.getElementById("bookModal");
            var span = document.getElementsByClassName("close")[0];

            $(document).on('click', '.reserve-button', function() {
    var id = $(this).data('id');
    window.location.href = '/books/' + id + '/reserve';
});


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
        $('#bookReserve').click(function() {
    window.location.href = '/books/' + id + '/reserve';
});


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

<style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #8d8b8d;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        }

        .table {
            margin-top: 20px;
            background: #f8f9fa;
        }

        .table th, .table td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #e9ecef;
        }

        .btn {
            margin-top: 20px;
        }
    </style>
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
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 300px;  /* Ancho fijo */
  height: 420px; /* Altura fija */
  overflow: auto;
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