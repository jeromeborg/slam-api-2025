<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        return Book::with('author')->get();
    }

     public function show(Book $book) {
        $book->load('author');

        return $book;
    }
}
