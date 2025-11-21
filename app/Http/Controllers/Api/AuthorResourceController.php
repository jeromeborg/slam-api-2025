<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorBooksResource;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorResourceController extends Controller
{
    public function index() {
        $authors = Author::withcount('books')->get();

        return AuthorResource::collection($authors);
    }

    public function show(Author $author) {
        $author->load('books');

        return new AuthorBooksResource($author);
    }
}
