<?php


namespace App\Core\Exception;


use Exception;
use Throwable;

class AuthorizationException extends AppException
{

    public function __construct($message = "Not authorized exception", $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


}