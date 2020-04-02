<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients\Exceptions;

class ClientNotFoundException extends \Exception
{
    protected $message = 'Clients not found exception.';
}
