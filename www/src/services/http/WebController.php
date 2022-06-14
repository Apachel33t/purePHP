<?php

namespace Services\Http;

trait WebController {
    public function views($path, array $vars = null, $code = 200)
    {
        http_response_code($code);
        require_once __DIR__ . '/../templates/' . $path;
    }
}