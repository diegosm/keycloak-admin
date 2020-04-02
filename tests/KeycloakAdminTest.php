<?php

declare(strict_types=1);

namespace Tests;

use KeycloakAdmin\Keycloak\Exceptions\UnauthorizedException;
use KeycloakAdmin\KeycloakAdmin;
use KeycloakAdmin\Realms\RealmManager;

class KeycloakAdminTest extends BaseTest
{
    public function testLoginUnauthorized()
    {
        $this->expectException(UnauthorizedException::class);

        $client = $this->createStubClient('Keycloak/unauthorized.json', 401);

        $manager = $this->createAdminManager($client);
    }

    public function testCanDefineKeycloakAuthAndReturnRealmManagerClass()
    {
        $client = $this->createStubClient('Keycloak/authorized.json', 200);

        $manager = $this->createAdminManager($client);

        $this->assertInstanceOf(RealmManager::class, $manager->realm());
    }

    private function createAdminManager($client) : KeycloakAdmin
    {
        return new KeycloakAdmin(
            $client,
            $this->keycloakAdminConfig,
            $this->serializer
        );
    }
}
