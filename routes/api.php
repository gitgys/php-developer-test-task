<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoansController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BooksController::class, 'index']);

Route::post('/loans', [LoansController::class, 'store']);
