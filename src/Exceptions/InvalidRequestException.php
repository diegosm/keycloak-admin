<?php

declare(strict_types=1);

namespace KeycloakAdmin\Exceptions;

class InvalidRequestException extends \Exception
{
    protected $message = 'Invalid request.';
}