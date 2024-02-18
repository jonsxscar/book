@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; background-color: #212129; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
        <div style="background: #f8f9fa; display: flex; padding: 20px; border-radius: 5px; width: 300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); flex-direction: column;">
            <form method="POST" action="{{ route('login') }}" style="margin-bottom: 15px;">
                @csrf

                <div class="form-group" style="margin-bottom: 10px; display: flex; justify-content: space-between;">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>

                <div class="form-group" style="margin-bottom: 20px; display: flex; justify-content: space-between;">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; background: #313139; color: white;">Iniciar sesión</button>
            </form>
            <button onclick="window.location.href='{{ route('register') }}'" class="btn btn-link" style= "background: #313139; color: white;">Registrarse</button>
        </div>
    </div>
@endsection
