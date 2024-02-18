<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::doesntHave('reservations')->get();
        return view('book.index', ['books' => $books]);
    }

    public function filter(Request $request)
{
    $category = $request->input('category');
    if ($category) {
        $books = Book::where('category', $category)->doesntHave('reservations')->get();
    } else {
        $books = Book::doesntHave('reservations')->get();
    }    
    return view('partials.book_list', ['books' => $books]);
}

}
