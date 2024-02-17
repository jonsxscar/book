@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
        </form>
    </div>
@endsection
