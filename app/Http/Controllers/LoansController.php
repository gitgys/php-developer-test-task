<?php

namespace App\Http\Controllers;

use App\Exceptions\LoanAlreadyReturnedException;
use App\Exceptions\OutOfStockException;
use App\Models\Loan;
use App\Services\LoanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    protected LoanService $loanService;

    public function __construct(LoanService $loanService) {
        $this->loanService = $loanService;
    }

    /**
     * @throws OutOfStockException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
        ]);

        $loan = $this->loanService->createLoan($request->book_id, $request->member_id);

        return response()->json([
            'message'=> 'Loan created successfully!',
            'data' => $loan,
        ]);
    }

    /**
     * @throws LoanAlreadyReturnedException
     */
    public function return(Loan $loan): JsonResponse
    {
        $loan = $this->loanService->returnLoan($loan);

        return response()->json([
            'message'=> 'Loan returned successfully!',
            'data' => $loan,
        ]);
    }
}
