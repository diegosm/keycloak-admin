<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserInvalidCredentialRepresentationException extends \Exception
{
    protected $message = 'User invalid credential representation.';
}
