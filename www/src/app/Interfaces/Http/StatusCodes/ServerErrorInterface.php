<?php

namespace App\Interfaces\Http\StatusCodes;

interface ServerErrorInterface {
    const InternalServerError = 500;
    const NotImplemented = 501;
    const BadGateway = 502;
    const ServiceUnavailable = 503;
    const GatewayTimeout = 504;
    const HTTPVersionNotSupported = 505;
}