<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use KeycloakAdmin\ProtocolMappers\AbstractProtocolMapperManager;

class ClientProtocolMapperManager extends AbstractProtocolMapperManager
{
    protected function getUrl(string $path = ''): string
    {
        $base = 'admin/realms/' . $this->realmName;
        $base .= '/clients/' . $this->idOfResource . '/protocol-mappers/models/';

        return $this->keycloakAdminConfig->getUrl(
            $base . $path
        );
    }
}
