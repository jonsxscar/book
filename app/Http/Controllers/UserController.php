<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Agrega aquí más métodos según sea necesario
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirige a donde quieras
            return redirect()->intended('dashboard');
        } else {
            // Autenticación fallida, redirige de nuevo al formulario de inicio de sesión
            return redirect()->back()->with('error', 'Las credenciales proporcionadas no son correctas.');
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'username' => ['required', 'string', 'max:25', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => ['required', 'string', 'max:25', 'unique:users'],
        ]);

        // Crea el usuario
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
        ]);

        // Redirige al usuario a donde quieras
        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    public function showDashboard()
    {
        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Obtiene las reservas activas del usuario
        $reservations = $user->reservations()->active()->get();

        // Retorna la vista del dashboard con los datos del usuario y sus reservas
        return view('dashboard', ['user' => $user, 'reservations' => $reservations]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
