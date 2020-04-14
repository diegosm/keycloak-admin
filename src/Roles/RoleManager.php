<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles;

class RoleManager extends AbstractRoleManager
{
    protected function getBaseUrl(string $path = '') : string
    {
        return $this->keycloakAdminConfig->getUrl(
            'admin/realms/' . $this->realmName . '/roles/' . $path
        );
    }
}
