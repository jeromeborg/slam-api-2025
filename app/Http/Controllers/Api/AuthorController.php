<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index() {
        return Author::withcount('books')->get();
    }

    public function show(Author $author) {
        $author->load('books');

        return $author;
    }
}
