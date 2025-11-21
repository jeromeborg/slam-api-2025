<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookFullResource;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookResourceController extends Controller
{
    public function index() {
        $books = Book::with('author')->paginate(10);

        return BookResource::collection($books);
    }

     public function show(Book $book) {
        $book->load('author');

        return $book->toResource(BookFullResource::class);
    }
}
