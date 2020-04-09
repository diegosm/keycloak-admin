<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes\Exceptions;

class ClientScopeUpdateException extends \Exception
{
    protected $message = 'Error when trying to update client scope.';
}
