<?php

namespace App\Exceptions;

use App\Interfaces\Http\StatusCodes\ServerErrorInterface;


class StorageError implements ServerErrorInterface
{
    public static function typeDoesNotExist(string $message)
    {
        http_response_code(self::InternalServerError);
        echo $message;
    }
}