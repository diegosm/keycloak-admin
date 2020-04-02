<?php

declare(strict_types=1);

namespace KeycloakAdmin\Keycloak\Exceptions;

class RequestInvalidException extends \Exception
{
    protected $message = 'Invalid request.';
}
