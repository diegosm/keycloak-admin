<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users\Exceptions;

class UserDeleteException extends \Exception
{
    protected $message = 'Error when trying to delete user.';
}
