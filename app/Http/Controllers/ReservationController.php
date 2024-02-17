<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', ['reservations' => $reservations]);
    }

/*     public function index()
{
$reservations = $user->reservations()->active()->get();
return view('reservation.index', ['reservations' => $reservations]);
}  */

    // Agrega aquí más métodos según sea necesario
}
