<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients\Exceptions;

class ClientNotFoundException extends \Exception
{
    protected $message = 'Client not found.';
}
