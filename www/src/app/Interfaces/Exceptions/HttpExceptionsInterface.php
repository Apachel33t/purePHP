<?php

namespace App\Interfaces\Exceptions;

interface HttpExceptionsInterface {
    public static function sendNotFound(): void;

    public static function serverError(string $message): void;
}