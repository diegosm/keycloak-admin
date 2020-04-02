<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients\Exceptions;

class ClientUpdateException extends \Exception
{
    protected $message = 'Error when trying to update client.';
}
