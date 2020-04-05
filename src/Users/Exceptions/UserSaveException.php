<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserSaveException extends \Exception
{
    protected $message = 'Error when trying to save user. ';
}
