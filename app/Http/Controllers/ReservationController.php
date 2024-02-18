<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Book; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    //this function is for creating a new reservation
    public function create($id)
    {
        $book = Book::find($id);
        // Return the view for creating a new reservation with the book data
        return view('reservation.create', ['book' => $book]);
    }

    // This function is for storing a new reservation
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'book_id' => ['required', 'exists:books,id'],
            'reservation_length' => ['required', 'integer', 'min:1'],
        ]);

        // Create a new reservation
        $reservation = new Reservation;
        $reservation->user_id = Auth::id();
        $reservation->book_id = $request->book_id;
        $reservation->reservation_date = now();
        $reservation->reservation_length = $request->reservation_length;
        $reservation->end_date = now()->addDays($request->reservation_length);
        $reservation->save();

        // Redirect the user to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Libro reservado con éxito.');
    }

    // This function is for deleting a reservation
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        // Redirect the user to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Reserva eliminada con éxito.');
    }
}
