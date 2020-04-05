<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserUpdateException extends \Exception
{
    protected $message = 'Error when trying to update user.';
}
