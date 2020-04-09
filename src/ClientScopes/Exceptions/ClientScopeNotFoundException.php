<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes\Exceptions;

class ClientScopeNotFoundException extends \Exception
{
    protected $message = 'Client scope not found.';
}
