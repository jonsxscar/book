@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reservar {{ $book->title }}</h1>
        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf

            <input type="hidden" name="book_id" value="{{ $book->id }}">

            <div class="form-group">
                <label for="reservation_length">Cantidad de días</label>
                <input type="number" name="reservation_length" id="reservation_length" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>
@endsection
