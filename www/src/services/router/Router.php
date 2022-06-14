<?php

namespace Services\Router;

use App\Interfaces\Routes\RouteInterface;

class Router implements RouteInterface
{
    use RouterHandlers;

    protected array $requestUri;
    protected string $requestPath;
    protected string $method;
    public $callback;


    public function get(string $path, array|callable $handler): void
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }


    public function post(string $path, array|callable $handler): void
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }


    public function put(string $path, array|callable $handler): void
    {
        $this->addHandler(self::METHOD_PUT, $path, $handler);
    }


    public function delete(string $path, array|callable $handler): void
    {
        $this->addHandler(self::METHOD_DELETE, $path, $handler);
    }


    public function patch(string $path, array|callable $handler): void
    {
        $this->addHandler(self::METHOD_PATCH, $path, $handler);
    }


    public function run(): void
    {
        $this->requestUri = parse_url($_SERVER['REQUEST_URI']);
        $this->requestPath = $this->requestUri['path'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->callback = null;

        foreach ($this->handlers as $handler) {
            if ($handler['path'] === $this->requestPath && $this->method === $handler['method']) {
                $this->callback = $handler['handler'];
            }
        }

        $this->initNotFoundHandler();

        call_user_func_array($this->callback, [
            array_merge($_GET, $_POST)
        ]);
    }
}