<?php

declare(strict_types=1);

namespace Tests\Realms;

use GuzzleHttp\Client;
use KeycloakAdmin\Realms\Realm;
use KeycloakAdmin\Realms\RealmCollection;
use PHPUnit\Framework\TestCase;
use Tests\KeycloakAdminTestFactory;

class RealmTest extends TestCase
{
    public function testCanSerializeRealm()
    {
        $keycloakAdmin = $this->createKeycloakAdmin();

        $results = $keycloakAdmin->realm()->list();

        $this->assertInstanceOf(RealmCollection::class, $results);

        $this->assertEquals(5, count($results->getRealms()));
    }

    public function testCanCreateRealmFromArray()
    {
        $config = [
          'realm' => 'myRealm'
        ];

        $admin = $this->createKeycloakAdmin();

        $result = $admin->realm()->createFromArray($config);
        $this->assertInstanceOf(Realm::class, $result->getRealm());
    }

    public function testItCanShowRealm()
    {
        $admin = $this->createKeycloakAdmin();

        $result = $admin->realm()->show('master');

        $this->assertInstanceOf(Realm::class, $result);
    }

    public function testCanCreateRealmFromJson()
    {
        $admin = $this->createKeycloakAdmin();

        $json = '{"realm": "MyRealm"}';

        $result = $admin->realm()->createFromJson($json);
        $this->assertInstanceOf(Realm::class, $result->getRealm());
    }

    public function testItCanSaveRealm()
    {
        $admin = $this->createKeycloakAdmin();

        $json = '{"realm": "myExample2"}';

        $result = $admin->realm()->createFromJson($json)->save();
        $this->assertInstanceOf(Realm::class, $result);
    }

    private function createKeycloakAdmin()
    {
        return KeycloakAdminTestFactory::create(
            new Client(),
            'manager-cli',
            '3a258032-69f9-402c-b1eb-706f700d652d',
            'http://keycloak:8080/auth'
        );
    }
}