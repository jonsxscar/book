@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
        <div style="background: #f8f9fa; display: flex; padding: 20px; border-radius: 5px; width: 300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); flex-direction: column;">
            <h1 style="margin-bottom: 15px; text-align: center;">Reservar {{ $book->title }}</h1>
            {{-- Create a form for reservation --}}
            <form method="POST" action="{{ route('reservations.store', ['id' => $book->id]) }}">
            {{-- Add CSRF token for security --}}
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">

                <div class="form-group" style="margin-bottom: 10px;">
                    <label for="reservation_length">Cantidad de días</label>
                    {{-- This input field accepts the number of days for the reservation. --}}
                    <input type="number" name="reservation_length" id="reservation_length" class="form-control" min="1">
                </div>

                {{-- This is the submit button for the form. --}}
                <button type="submit" class="btn btn-primary" style="width: 100%; background: #313139; color: white;">Reservar</button>
            </form>
            {{-- This form sends a GET request to the 'books.index' route. --}}
            <form method="GET" action="{{ route('books.index') }}" style="margin-top: 10px;">
                @csrf
                <button type="submit" class="btn btn-primary" style="width: 100%; background: #313139; color: white;">Regresar</button>
            </form>
        </div>
    </div>
@endsection
