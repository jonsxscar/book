@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis reservas</h1>
    @foreach ($reservations as $reservation)
        <div>
            <h2>{{ $reservation->book->title }}</h2>
            <p>Reservado desde: {{ $reservation->reservation_date }}</p>
            <!-- Agrega aquí más información sobre la reserva -->
        </div>
    @endforeach
</div>
@endsection
