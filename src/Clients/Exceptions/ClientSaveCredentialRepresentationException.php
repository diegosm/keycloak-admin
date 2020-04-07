<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients\Exceptions;

class ClientSaveCredentialRepresentationException extends \Exception
{
    protected $message = 'Error when trying to save client credential representation.';
}
