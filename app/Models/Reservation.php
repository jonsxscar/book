<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'reservation_date',
        'reservation_length',
        // otros campos necesarios
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function scopeActive($query)
{
    return $query->where('end_date', '>', now());
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


}
