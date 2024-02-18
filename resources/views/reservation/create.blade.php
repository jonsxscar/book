@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
        <div style="background: #f8f9fa; display: flex; padding: 20px; border-radius: 5px; width: 300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); flex-direction: column;">
            <h1 style="margin-bottom: 15px; text-align: center;">Reservar {{ $book->title }}</h1>
            <form method="POST" action="{{ route('reservations.store', ['id' => $book->id]) }}">
                @csrf

                <input type="hidden" name="book_id" value="{{ $book->id }}">

                <div class="form-group" style="margin-bottom: 10px;">
                    <label for="reservation_length">Cantidad de días</label>
                    <input type="number" name="reservation_length" id="reservation_length" class="form-control" min="1">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; background: #313139; color: white;">Reservar</button>
            </form>
        </div>
    </div>
@endsection
