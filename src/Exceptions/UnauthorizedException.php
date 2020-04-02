<?php

declare(strict_types=1);

namespace KeycloakAdmin\Exceptions;

class UnauthorizedException extends \Exception
{
    protected $message = '401 Unauthorized';
}
