<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // This function returns all books that are not reserved
    public function index()
    {
        $books = Book::doesntHave('reservations')->get();
        return view('book.index', ['books' => $books]);
    }

    // This function filters books by category
    public function filter(Request $request)
{
    $category = $request->input('category');
    if ($category) {
        $books = Book::where('category', $category)->doesntHave('reservations')->get();
    } else {
        // If no category is provided, get all books that are not reserved
        $books = Book::doesntHave('reservations')->get();
    }
    // Return the view with the list of filtered books    
    return view('partials.book_list', ['books' => $books]);
}
}