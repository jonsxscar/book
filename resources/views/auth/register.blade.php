@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; background-color: #212129; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">
        <div style="background: #f8f9fa; display: flex; padding: 20px; border-radius: 5px; width: 300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); flex-direction: column;">
            <h1 style="margin-bottom: 15px; text-align: center;">Registrarse</h1>
            {{-- Create a form for registration --}}
            <form method="POST" action="{{ route('register') }}">
            {{-- Add CSRF token for security --}}
                @csrf
                {{-- Create a form group for the username with validation real time --}}
                <div class="form-group" style="margin-bottom: 10px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form-control" oninput="validateUsername()">
                    <span id="usernameError" style="color:red"></span>
                </div>
                {{-- Create a form group for the name with validation real time--}}
                <div class="form-group" style="margin-bottom: 10px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" oninput="validateName()">
                    <span id="nameError" style="color:red"></span>
                </div>
                {{-- Create a form group for the password with validation real time--}}
                <div class="form-group" style="margin-bottom: 10px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" oninput="validatePassword()">
                    <span id="passwordError" style="color:red"></span>
                </div>
                {{-- Create a form group for the password confirmation --}}
                <div class="form-group" style="margin-bottom: 20px; display: flex; justify-content: space-between; flex-direction: column;">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                {{-- Create a submit button for the form --}}
                <button type="submit" class="btn btn-primary" style="width: 100%; background: #313139; color: white;">Registrarse</button>
            </form>
            {{-- Create a button for navigating to the login page --}}
            <button onclick="window.location.href='{{ route('login') }}'" class="btn btn-link" style="margin-top: 10px; background: #313139; color: white;">Ya tengo una cuenta</button>
        </div>
    </div>
    {{-- JavaScript for form validation --}}
    <script>
    function validateUsername() {
        var username = document.getElementById('username').value;
        var usernameError = document.getElementById('usernameError');

        // Check if the username is too long
        if (username.length > 25) {
            usernameError.textContent = 'El nombre de usuario no puede tener más de 25 caracteres.';
        } else {
            usernameError.textContent = '';
        }
    }

    function validateName() {
        var name = document.getElementById('name').value;
        var nameError = document.getElementById('nameError');

        // Check if the name contains numbers
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

        // Check if the password is too short
        if (password.length < 8) {
            passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres.';
        } else {
            passwordError.textContent = '';
        }
    }
    </script>
@endsection
