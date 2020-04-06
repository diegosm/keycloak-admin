<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserEmptyCredentialRepresentationException extends \Exception
{
    protected $message = 'User empty credential representation.';
}
