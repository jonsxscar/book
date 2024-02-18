<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //this function shows the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // This function handles the login request
    public function login(Request $request)
    {
        // Get the credentials from the request
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful, redirect to dashboard
            return redirect()->intended('dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Las credenciales proporcionadas no son correctas.');
        }
    }

    // This function shows the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // This function handles the registration request
    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => ['required', 'string', 'max:25', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => ['required', 'string', 'max:25', 'unique:users'],
        ]);

        // Create the user. hash function make = encript password
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
        ]);

        // Redirect the user login
        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    // This function shows the dashboard
    public function showDashboard()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the user's active reservations
        $reservations = $user->reservations()->active()->get();

        // Return the dashboard view with the user data and their reservations
        return view('dashboard', ['user' => $user, 'reservations' => $reservations]);
    }

    // This function handles the logout request
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
