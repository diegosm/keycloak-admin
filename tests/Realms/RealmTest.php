<?php

declare(strict_types=1);

namespace Tests\Realms;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\Realms\Realm;
use KeycloakAdmin\Realms\RealmCollection;
use KeycloakAdmin\Realms\RealmManager;
use Tests\BaseTest;
use Tests\KeycloakAdminTestFactory;

class RealmTest extends BaseTest
{
    public function testCanSerializeRealm()
    {
        $client = $this->createStubClient('Clients/list.json');

        $manager = $this->createRealmManager($client);

        $results = $manager->list();

        $this->assertInstanceOf(RealmCollection::class, $results);

        $this->assertEquals(25, count($results->getRealms()));
    }

    public function testCanCreateRealmFromArray()
    {
        $config = [
            'realm' => 'myRealm'
        ];

        $manager = $this->createRealmManager();

        $result = $manager->createFromArray($config);

        $this->assertInstanceOf(Realm::class, $result->getRealm());

        $this->assertEquals('myRealm', $result->getRealm()->getRealm());
    }

    public function testCanCreateRealmFromJson()
    {
        $json = '{"realm": "MyRealm", "notBefore": 1000}';

        $manager = $this->createRealmManager();

        $result = $manager->createFromJson($json);

        $this->assertInstanceOf(Realm::class, $result->getRealm());

        $this->assertEquals(1000, $result->getRealm()->getNotBefore());
    }

    public function testItCanSaveRealm()
    {
        $json = '{"realm": "myExample2", "notBefore": 1000}';

        $client = $this->createStubClient('Realms/create.json', 201);

        $manager = $this->createRealmManager($client);

        $result = $manager->createFromJson($json)->save();

        $this->assertInstanceOf(Realm::class, $result);

        $this->assertEquals(1000, $result->getNotBefore());
    }

    public function testItCanShowRealm()
    {
        $client = $this->createStubClient('Realms/show.json');

        $manager = $this->createRealmManager($client);

        $result = $manager->show('master');

        $this->assertInstanceOf(Realm::class, $result);
    }

    public function testItCanUpdateRealmInfo()
    {
        $json = '{"realm": "abcdef", "notBefore": 1000 }';

        $updateResponse = new Response(
            204,
            [],
            file_get_contents('tests/Stubs/Realms/update.json')
        );

        $showResponse = new Response(
            200,
            [],
            $json
        );

        $client = $this->getMockBuilder(Client::class)->getMock();
        $client->expects($this->at(0))
            ->method('request')
            ->willReturn($updateResponse);

        $client->expects($this->at(1))
            ->method('request')
            ->willReturn($showResponse);

        $manager = $this->createRealmManager($client);

        $result = $manager->createFromJson($json)->update();
        $this->assertEquals(1000, $result->getNotBefore());
    }

    public function testCanDeleteRealm()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createRealmManager($client);

        $this->assertNull(
            $manager->delete('realmName')
        );
    }

    private function createRealmManager($client = null) : RealmManager
    {
        if (null === $client) {
            $client = $this->createStubClient();
        }

        return new RealmManager(
            $client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth
        );
    }
}
