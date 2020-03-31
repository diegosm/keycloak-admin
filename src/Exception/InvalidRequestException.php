<?php

declare(strict_types=1);

namespace KeycloakAdmin\Exception;

class InvalidRequestException extends \Exception
{
    protected $message = 'Invalid request.';
}