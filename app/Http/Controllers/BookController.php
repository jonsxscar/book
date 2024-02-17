<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request; // Asegúrate de tener esta línea

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }

    // Agrega aquí más métodos según sea necesario
    public function filter(Request $request)
{
    $category = $request->input('category');
    if ($category) {
        $books = Book::where('category', $category)->get();
    } else {
        $books = Book::all();
    }
    return view('partials.book_list', ['books' => $books]);
}

}
