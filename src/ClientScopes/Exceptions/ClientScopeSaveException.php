<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes\Exceptions;

class ClientScopeSaveException extends \Exception
{
    protected $message = 'Error when trying to save client scope.';
}
