<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles\Exceptions;

class RoleSaveException extends \Exception
{
    protected $message = 'Error when trying to save role.';
}
