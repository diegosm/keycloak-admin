<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles\Exceptions;

class RoleNotFoundException extends \Exception
{
    protected $message = 'Role not found.';
}
