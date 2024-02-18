<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes for user regisration
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register'); //display
Route::post('/register', [UserController::class, 'register']); // Handles the registration request

// Routes for user authentication
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login'); // Displays the login form
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Routes for user account information
Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard')->middleware('auth');//display

// Routes for user reservations
Route::get('/books/{id}/reserve', [ReservationController::class, 'create'])->name('reservations.create');//display
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

// Routes for available books
Route::get('/books', [BookController::class, 'index'])->name('books.index'); //display
// Creates a new reservation for a specific book
Route::post('/books/{id}/reserve', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/filter', [BookController::class, 'filter']); // Filters the books based on certain criteria
