<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserInvalidException extends \Exception
{
    protected $message = 'User invalid exception';
}
