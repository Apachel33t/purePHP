<?php

namespace App\Http\Controllers;

class ClientErrorController extends Controller
{
    public function notFound()
    {
        $this->views('/errors/40x.phtml', [
            'title' => "Not Found"
        ], self::NotFound);
    }
}