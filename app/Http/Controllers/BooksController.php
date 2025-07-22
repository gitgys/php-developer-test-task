<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }
}
