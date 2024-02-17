<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Book; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', ['reservations' => $reservations]);
    }

    public function create($id)
    {
        $book = Book::find($id);
        return view('reservation.create', ['book' => $book]);
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'book_id' => ['required', 'exists:books,id'],
            'reservation_length' => ['required', 'integer', 'min:1'],
        ]);

        // Crea la reserva
        $reservation = new Reservation;
        $reservation->user_id = Auth::id();
        $reservation->book_id = $request->book_id;
        $reservation->reservation_date = now();
        $reservation->reservation_length = $request->reservation_length;
        $reservation->end_date = now()->addDays($request->reservation_length);
        $reservation->save();

        // Redirige al usuario al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Libro reservado con éxito.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->route('dashboard')->with('success', 'Reserva eliminada con éxito.');
    }



/*     public function index()
{
$reservations = $user->reservations()->active()->get();
return view('reservation.index', ['reservations' => $reservations]);
}  */

    // Agrega aquí más métodos según sea necesario
}
