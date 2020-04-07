<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients\Exceptions;

class ClientInvalidCredentialManagerException extends \Exception
{
    protected $message = 'Clients invalid exception';
}
