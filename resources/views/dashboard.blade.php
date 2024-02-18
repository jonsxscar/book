@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
        <div style="background: #f8f9fa; display: flex; padding: 20px; border-radius: 5px; width: 300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); flex-direction: column;">
            <h1 style="margin-bottom: 15px; text-align: center;">Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}" style="margin-bottom: 10px;">
                @csrf
                <button type="submit" class="btn btn-danger" style="width: 100%;">Cerrar sesión</button>
            </form>

            <form method="GET" action="{{ route('books.index') }}" style="margin-bottom: 20px;">
                @csrf
                <button type="submit" class="btn btn-primary" style="width: 100%;">Mostrar libros</button>
            </form>

            <p>Nombre: {{ $user->name }}</p>
            <p>Total de reservas: {{ $reservations->count() }}</p>

            <h3 style="margin-top: 20px;">Reservas activas:</h3>
            @foreach ($reservations as $reservation)
                <p>{{ $reservation->book->title }} - {{ $reservation->start_date }} a {{ $reservation->end_date }}</p>
                <form method="POST" action="{{ route('reservations.destroy', ['id' => $reservation->id]) }}" style="margin-bottom: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="width: 100%;">Eliminar reserva</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
