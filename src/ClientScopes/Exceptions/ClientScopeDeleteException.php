<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes\Exceptions;

class ClientScopeDeleteException extends \Exception
{
    protected $message = 'Error when trying to delete client scope.';
}
