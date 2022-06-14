<?php

namespace App\Interfaces\Http\StatusCodes;

interface RedirectionInterface {
    const MultipleChoice = 300;
    const MovedPermanently = 301;
    const Found = 302;
    const SeeOther = 303;
    const NotModified = 304;
    const UseProxy = 305;
    const SwitchProxy = 306;
    const TemporaryRedirect = 307;
    const PermanentRedirect = 308;
}