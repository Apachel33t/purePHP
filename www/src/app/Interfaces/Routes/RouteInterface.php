<?php

namespace App\Interfaces\Routes;

interface RouteInterface {
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_DELETE = 'DELETE';
    public const METHOD_PATCH = 'PATCH';

    public function get(string $path, array $handler): void;

    public function post(string $path, array $handler): void;

    public function put(string $path, array $handler): void;

    public function delete(string $path, array $handler): void;

    public function patch(string $path, array $handler): void;

    public function run():void;
}