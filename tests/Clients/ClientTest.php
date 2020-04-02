<?php

declare(strict_types=1);

namespace Tests\Clients;

use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\Clients\Client;
use KeycloakAdmin\Clients\ClientCollection;
use KeycloakAdmin\Clients\ClientManager;
use Tests\BaseTest;

class ClientTest extends BaseTest
{
    public function testItCanListClientsOfRealm()
    {
        $client = $this->createStubClient('Clients/list.json');

        $manager = $this->createClientManager($client);

        $result = $manager->list();

        $this->assertInstanceOf(ClientCollection::class, $result);
    }

    public function testCanCreatClientFromArray()
    {
        $config = [
            'id' => 'myCli',
            'adminUrl' => 'http://root-url.com',
            'authorizationServicesEnabled' => false
        ];

        $manager = $this->createClientManager();

        $result = $manager->createFromArray($config);

        $this->assertInstanceOf(Client::class, $result->getClient());

        $this->assertEquals('myCli', $result->getClient()->getId());
    }

    public function testCanCreatClientFromJson()
    {
        $json = '{"id": "myCli", "baseUrl": "http://base-url.com"}';

        $manager = $this->createClientManager();

        $result = $manager->createFromJson($json);

        $this->assertInstanceOf(Client::class, $result->getClient());

        $this->assertEquals("http://base-url.com", $result->getClient()->getBaseUrl());
    }

    public function testItCanSaveClient()
    {
        $json = '{"id": "0be0847b-fbc8-44db-afac-d52323463f3f", "baseUrl": "http://localhost:3000"}';

        $client = $this->createStubClient('Clients/create.json', 201);

        $manager = $this->createClientManager($client);

        $result = $manager->createFromJson($json)->save();

        $this->assertInstanceOf(Client::class, $result);

        $this->assertEquals("http://localhost:3000", $result->getBaseUrl());
    }

    public function testItCanShowClientDetails()
    {
        $client = $this->createStubClient('Clients/show.json');

        $manager = $this->createClientManager($client);

        $result = $manager->show('myId');

        $this->assertInstanceOf(Client::class, $result);
    }

    public function testCanUpdateClientInfo()
    {
        $json = '{"id": "0be0847b-fbc8-44db-afac-d52323463f3f", "name": "My Client"}';

        $updateResponse = new Response(
            204,
            [],
            file_get_contents('tests/Stubs/Clients/update.json')
        );

        $showResponse = new Response(
            200,
            [],
            $json
        );

        $client = $this->getMockBuilder(\GuzzleHttp\Client::class)->getMock();
        $client->expects($this->at(0))
            ->method('request')
            ->willReturn($updateResponse);

        $client->expects($this->at(1))
            ->method('request')
            ->willReturn($showResponse);

        $manager = $this->createClientManager($client);

        $result = $manager->createFromJson($json)->update();
        $this->assertEquals("My Client", $result->getName());
    }

    public function testCanDeleteClient()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createClientManager($client);

        $this->assertNull(
            $manager->delete('idMyClient')
        );
    }

    protected function createClientManager($clientHTTP = null) : ClientManager
    {
        if (null === $clientHTTP) {
            $clientHTTP = $this->createStubClient();
        }

        return new ClientManager(
            $clientHTTP,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            'master'
        );
    }
}
