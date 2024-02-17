<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rutas para el registro de usuario
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// Rutas para la autenticación de usuarios
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rutas para la información de la cuenta del usuario
Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard')->middleware('auth');

// Rutas para las reservas del usuario
Route::get('/books/{id}/reserve', [ReservationController::class, 'create'])->name('reservations.create');
//Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

// Rutas para los libros disponibles
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books/{id}/reserve', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/filter', [BookController::class, 'filter']);


