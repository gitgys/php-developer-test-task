<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    /**
     * Returns all available books.
     *
     * @return Collection
     */
    public function showBooks(): Collection
    {
        return Book::all();
    }
}
