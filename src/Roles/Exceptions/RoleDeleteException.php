<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles\Exceptions;

class RoleDeleteException extends \Exception
{
    protected $message = 'Error when trying to delete role.';
}
