<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients\Exceptions;

class ClientDeleteException extends \Exception
{
    protected $message = 'Error when trying to delete client.';
}
