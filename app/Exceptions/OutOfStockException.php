<?php

namespace App\Exceptions;

use Exception;

class OutOfStockException extends Exception
{
    protected $message = 'The book is out of stock!';
    protected $code = 409;
}
