@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; background-color: #212129; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
        <div style="background: #f8f9fa; display: flex; padding: 20px; border-radius: 5px; width: 300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); flex-direction: column;">
            <h1 style="margin-bottom: 15px; text-align: center;">Registrarse</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group" style="margin-bottom: 10px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form-control" oninput="validateUsername()">
                    <span id="usernameError" style="color:red"></span>
                </div>

                <div class="form-group" style="margin-bottom: 10px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" oninput="validateName()">
                    <span id="nameError" style="color:red"></span>
                </div>

                <div class="form-group" style="margin-bottom: 10px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" oninput="validatePassword()">
                    <span id="passwordError" style="color:red"></span>
                </div>

                <div class="form-group" style="margin-bottom: 20px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; background: #313139; color: white;">Registrarse</button>
            </form>
            <button onclick="window.location.href='{{ route('login') }}'" class="btn btn-link" style="margin-top: 10px; background: #313139; color: white;">Ya tengo una cuenta</button>
        </div>
    </div>

    <script>
    function validateUsername() {
        var username = document.getElementById('username').value;
        var usernameError = document.getElementById('usernameError');

        // Verifica si el nombre de usuario contiene números
        if (username.length > 25) {
            usernameError.textContent = 'El nombre de usuario no puede tener más de 25 caracteres.';
        } else {
            usernameError.textContent = '';
        }
    }

    function validateName() {
        var name = document.getElementById('name').value;
        var nameError = document.getElementById('nameError');

        // Verifica si el nombre contiene números
        if (/\d/.test(name)) {
            nameError.textContent = 'El nombre no puede contener números.';
        } else if (name.length > 25) {
            nameError.textContent = 'El nombre no puede tener más de 25 caracteres.';
        } else {
            nameError.textContent = '';
        }
    }

    function validatePassword() {
        var password = document.getElementById('password').value;
        var passwordError = document.getElementById('passwordError');

        // Verifica si la contraseña tiene al menos 8 caracteres
        if (password.length < 8) {
            passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres.';
        } else {
            passwordError.textContent = '';
        }
    }
    </script>
@endsection
