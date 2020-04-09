<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes\Exceptions;

class ClientScopeInvalidException extends \Exception
{
    protected $message = 'Invalid client scope.';
}
