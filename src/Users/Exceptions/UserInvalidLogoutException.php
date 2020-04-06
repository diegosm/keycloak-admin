<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserInvalidLogoutException extends \Exception
{
    protected $message = 'Error when trying to logout.';
}
