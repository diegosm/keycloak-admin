<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\Exceptions\UnauthorizedException;
use KeycloakAdmin\Realms\RealmManager;
use PHPUnit\Framework\TestCase;

class KeycloakAdminTest extends TestCase
{
    public function testLoginUnauthorized()
    {
        $this->expectException(UnauthorizedException::class);

        $response = new Response(401, [], file_get_contents('tests/stubs/401unauthorized.json'));

        $client = $this->createStub(Client::class);
        $client->method('request')->willReturn($response);

        $keycloakAdmin = KeycloakAdminTestFactory::create(
            $client,
            'admin',
            'Pa55w0rd',
            'http://keycloak:8080/auth'
        );
    }

    public function testCanDefineKeycloakAuthAndReturnRealmManagerClass()
    {
        $response = new Response(200, [], file_get_contents('tests/stubs/authorizedAccess.json'));

        $client = $this->createStub(Client::class);
        $client->method('request')->willReturn($response);

        $keycloakAdmin= KeycloakAdminTestFactory::create(
                    $client,
            'admin',
            'Pa55w0rd',
            'http://keycloak:8080/auth'
        );

        $this->assertInstanceOf(RealmManager::class, $keycloakAdmin->realm());
    }
}