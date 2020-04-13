<?php

declare(strict_types=1);

namespace Tests;

use KeycloakAdmin\Clients\ClientManager;
use KeycloakAdmin\ClientScopes\ClientScopeManager;
use KeycloakAdmin\Keycloak\Exceptions\UnauthorizedException;
use KeycloakAdmin\KeycloakAdmin;
use KeycloakAdmin\Realms\RealmManager;
use KeycloakAdmin\Roles\RoleManager;
use KeycloakAdmin\Users\UserManager;

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

    public function testMustHaveClientManager()
    {
        $client = $this->createStubClient('Keycloak/authorized.json', 200);

        $manager = $this->createAdminManager($client);

        $this->assertInstanceOf(ClientManager::class, $manager->client('client'));
    }

    public function testMustHaveRoleManager()
    {
        $client = $this->createStubClient('Keycloak/authorized.json', 200);

        $manager = $this->createAdminManager($client);

        $this->assertInstanceOf(RoleManager::class, $manager->role('client', 'id'));
    }

    public function testMustHaveUserManager()
    {
        $client = $this->createStubClient('Keycloak/authorized.json', 200);

        $manager = $this->createAdminManager($client);

        $this->assertInstanceOf(UserManager::class, $manager->user('realm'));
    }

    public function testMustHaveClientScopeManager()
    {
        $client = $this->createStubClient('Keycloak/authorized.json', 200);

        $manager = $this->createAdminManager($client);

        $this->assertInstanceOf(ClientScopeManager::class, $manager->clientScope('realm'));
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
