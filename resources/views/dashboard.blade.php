@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">Cerrar sesión</button>
</form>

<form method="GET" action="{{ route('books.index') }}" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">mostrar libros</button>
</form>

                    <p>Nombre: {{ $user->name }}</p>
                    <p>Total de reservas: {{ $reservations->count() }}</p>

                    <h3>Reservas activas:</h3>
                    @foreach ($reservations as $reservation)
                        <p>{{ $reservation->book->title }} - {{ $reservation->start_date }} a {{ $reservation->end_date }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
