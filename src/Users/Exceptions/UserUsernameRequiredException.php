<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserUsernameRequiredException extends \Exception
{
    protected $message = 'Username is required to save new user.';
}
