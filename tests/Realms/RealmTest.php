<?php

declare(strict_types=1);

namespace Tests\Realms;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\Realms\RealmCollection;
use PHPUnit\Framework\TestCase;
use Tests\KeycloakAdminTestFactory;

class RealmTest extends TestCase
{
    public function testCanSerializeRealm()
    {
        $keycloakAdmin = KeycloakAdminTestFactory::create(
            new Client(),
            'admin',
            'Pa55w0rd',
            'http://keycloak:8080/auth'
        );

        $results = $keycloakAdmin->realm()->list();

        $this->assertInstanceOf(RealmCollection::class, $results);

        $this->assertEquals(5, count($results->getRealms()));
    }
}