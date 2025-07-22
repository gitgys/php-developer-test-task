<?php

namespace App\Exceptions;

use Exception;

class LoanAlreadyReturnedException extends Exception
{
    protected $message = 'Loan already returned!';
    protected $code = 400;
}
