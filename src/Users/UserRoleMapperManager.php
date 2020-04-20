<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use KeycloakAdmin\Roles\AbstractRoleMapperManager;

class UserRoleMapperManager extends AbstractRoleMapperManager
{
    protected function resourceUrl(): string
    {
        return 'users';
    }
}
