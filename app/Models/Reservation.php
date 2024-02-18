<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'book_id',
        'reservation_date',
        'reservation_length',
    ];

    // Define an inverse one-to-many relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define an inverse one-to-many relationship with the Book model
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Define a query scope for active reservations
    public function scopeActive($query)
    {
        return $query->where('end_date', '>', now());
    }
}
