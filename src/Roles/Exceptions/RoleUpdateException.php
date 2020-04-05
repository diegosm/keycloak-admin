<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles\Exceptions;

class RoleUpdateException extends \Exception
{
    protected $message = 'Error when trying to update role.';
}
