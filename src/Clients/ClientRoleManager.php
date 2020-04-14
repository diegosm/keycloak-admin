<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use KeycloakAdmin\Roles\AbstractRoleManager;

class ClientRoleManager extends AbstractRoleManager
{
    protected function getBaseUrl(string $path = ''): string
    {
        return $this->keycloakAdminConfig->getUrl(
            'admin/realms/' . $this->realmName . '/clients/' . $this->idOfClient . '/roles/' . $path
        );
    }
}
