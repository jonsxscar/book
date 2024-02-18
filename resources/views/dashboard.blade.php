@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 90vh;">
        <div style="background: #f8f9fa; display: flex; padding: 20px; border-radius: 5px; width: 300px; height: 450px; overflow: auto; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); flex-direction: column;">
            <h1 style="margin-bottom: 15px; text-align: center;">Datos de usuario</h1>

            {{-- These lines display the user's name and total number of reservations. --}}
            <p>Nombre: {{ $user->name }}</p>
            <p>Total de reservas: {{ $reservations->count() }}</p>

            {{-- This form sends a POST request to the 'logout' route. --}}
            <form method="POST" action="{{ route('logout') }}" style="margin-bottom: 10px;">
                @csrf
                <button type="submit" class="btn btn-danger" style="width: 100%;">Cerrar sesión</button>
            </form>

            {{-- This form sends a GET request to the 'books.index' route. --}}
            <form method="GET" action="{{ route('books.index') }}" style="margin-bottom: 20px;">
                @csrf
                <button type="submit" class="btn btn-primary" style="width: 100%; background: #313139; color: white;">Mostrar libros</button>
            </form>

            <h3 style="margin-top: 20px; display: flex; justify-content: center;">Reservas activas:</h3>
            {{-- This is a table that displays the active reservations. --}}
            <table class="table table-striped" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Fecha de finalización</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td style="text-align: center;">{{ $reservation->book->title }}</td>
                            <td style="text-align: center;">{{ $reservation->end_date }}</td>
                            <td>
                            {{-- This form sends a DELETE request to the reservations.destroy--}}
                                <form method="POST" action="{{ route('reservations.destroy', ['id' => $reservation->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background: #8d1e13; color: white;" >Eliminar reserva</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
