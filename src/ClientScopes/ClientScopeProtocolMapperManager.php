<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes;

use KeycloakAdmin\ProtocolMappers\AbstractProtocolMapperManager;

class ClientScopeProtocolMapperManager extends AbstractProtocolMapperManager
{
    protected function getUrl(string $path = ''): string
    {
        $base = 'admin/realms/' . $this->realmName;
        $base .= '/client-scopes/' . $this->idOfResource . '/protocol-mappers/models/';

        return $this->keycloakAdminConfig->getUrl(
            $base . $path
        );
    }
}
