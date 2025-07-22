<?php

namespace App\Services;

use App\Exceptions\LoanAlreadyReturnedException;
use App\Exceptions\OutOfStockException;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Support\Carbon;

class LoanService
{
    /**
     * Crate a new loan if the book has available copies.
     *
     * @param int $bookId
     * @param int $memberId
     *
     * @return Loan
     *
     * @throws OutOfStockException
     */
    public function createLoan(int $bookId, int $memberId): Loan
    {
        $book = Book::find($bookId);

        if ($book->available_copies <= 0) {
            throw new OutOfStockException();
        }

        $book->available_copies--;
        $book->save();

        return Loan::create([
            'book_id' => $bookId,
            'member_id' => $memberId,
            'due_at' => now()->addDays(10),
            'returned_at' => null,
        ]);
    }

    /**
     * Returns a loan, if it has not been returned already.
     *
     * @param Loan $loan
     *
     * @return Loan
     *
     * @throws LoanAlreadyReturnedException
     */
    public function returnLoan(Loan $loan): Loan
    {
        if ($loan->returned_at) {
            throw new LoanAlreadyReturnedException();
        }

        $loan->returned_at = Carbon::now();
        $loan->save();

        $loan->book()->increment('available_copies');

        return $loan;
    }
}
