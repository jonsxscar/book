@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p>Total de reservas: {{ $user->reservations->count() }}</p>
        <!-- Agrega aquí más información sobre el usuario -->
    </div>
@endsection
