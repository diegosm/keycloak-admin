<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserNotFoundException extends \Exception
{
    protected $message = 'User not found.';
}
