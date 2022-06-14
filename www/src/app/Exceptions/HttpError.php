<?php

namespace App\Exceptions;

use App\Interfaces\Exceptions\HttpExceptionsInterface;
use App\Interfaces\Http\StatusCodes\ClientErrorInterface;
use App\Interfaces\Http\StatusCodes\ServerErrorInterface;


class HttpError implements ClientErrorInterface, HttpExceptionsInterface, ServerErrorInterface
{
    const NotFoundMessage = "HTTP/1.0 404 Not Found";
    const InternalServerErrorMessage = "HTTP/1.0 500 Internal Server Error";

    public static function sendNotFound(): void
    {
        header(self::NotFoundMessage, true, self::NotFound);
        echo self::NotFoundMessage;
    }

    public static function serverError(string $message): void
    {
        header(self::InternalServerErrorMessage, true, self::InternalServerError);
        echo $message;
    }
}