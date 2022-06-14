<?php

namespace Services\Router;

use App\Exceptions\HttpError;
use App\Http\Controllers\Controller;


trait RouterHandlers
{
    protected array $handlers;
    protected $notFoundHandler;

    /**
     * @param string $method
     * @param string $path
     * @param array|callable $handler
     */
    public function addHandler(string $method, string $path, array|callable $handler): void
    {
        if (gettype($handler) == "array") {
            $className = array_shift($handler);
            $executor = array_shift($handler);
            $class = new $className;

            if ($class instanceof Controller) {
                $this->callback = [$class, $executor];

                $this->handlers[$method . $path] = [
                    'method' => $method,
                    'path' => $path,
                    'handler' => $this->callback
                ];
            } else {
                HttpError::serverError("Class must be instance of App\Http\Controllers\Controller");
            }
        } else {
            $this->handlers[$method . $path] = [
                'method' => $method,
                'path' => $path,
                'handler' => $handler
            ];
        }
    }


    public function initNotFoundHandler()
    {
        if (empty($this->callback)) {
            if (!empty($this->notFoundHandler)) {
                $this->callback = $this->notFoundHandler;
            } else {
                HttpError::sendNotFound();
            }
        }
    }

    /**
     * @param $handler
     */
    public function addNotFoundHandler($handler)
    {
        if (gettype($handler) == "array") {
            $className = array_shift($handler);
            $executor = array_shift($handler);
            $class = new $className;
            if ($class instanceof Controller) {
                $this->notFoundHandler = [$class, $executor];
            } else {
                HttpError::serverError("Class must be instance of App\Http\Controllers\Controller");
            }
        } else {
            $this->notFoundHandler = $handler;
        }
    }
}