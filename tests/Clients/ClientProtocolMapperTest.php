<?php

declare(strict_types=1);

namespace Tests\Clients;

use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\Clients\ClientProtocolMapperManager;
use KeycloakAdmin\ProtocolMappers\ProtocolMapper;
use KeycloakAdmin\ProtocolMappers\ProtocolMapperCollection;
use Tests\BaseTest;

class ClientProtocolMapperTest extends BaseTest
{
    public function testItCanListProtocolMappers()
    {
        $client = $this->createStubClient('Clients/ProtocolMappers/list.json', 200);

        $manager = $this->createClientProtocolMapperManager($client);

        $result = $this->assertInstanceOf(ProtocolMapperCollection::class, $manager->list());
    }

    public function testItCanSaveClientProtocolMapper()
    {
        $json = '{"id": "0be0847b-fbc8-44db-afac-d52323463f3f", "name": "myname"}';

        $client = $this->createStubClient('', 201);

        $manager = $this->createClientProtocolMapperManager($client);

        $result = $manager->createFromJson($json)->save();

        $this->assertInstanceOf(ProtocolMapper::class, $result);

        $this->assertEquals("myname", $result->getName());
    }

    public function testItCanShowClientProtocolMapper()
    {
        $client = $this->createStubClient('Clients/ProtocolMappers/show.json', 200);

        $manager = $this->createClientProtocolMapperManager($client);

        $result = $manager->show('my-id');

        $this->assertInstanceOf(ProtocolMapper::class, $result);

        $this->assertEquals("my-scope-mapper4444", $result->getName());
    }

    public function testItCanUpdateClientProtocolMapper()
    {
        $json = '{"id": "0be0847b-fbc8-44db-afac-d52323463f3f", "name": "My Client"}';

        $updateResponse = new Response(
            204,
            [],
            $json
        );

        $showResponse = new Response(
            200,
            [],
            file_get_contents('tests/Stubs/Clients/ProtocolMappers/update.json')
        );

        $client = $this->getMockBuilder(\GuzzleHttp\Client::class)->getMock();
        $client->expects($this->at(0))
            ->method('request')
            ->willReturn($updateResponse);

        $client->expects($this->at(1))
            ->method('request')
            ->willReturn($showResponse);

        $manager = $this->createClientProtocolMapperManager($client);

        $result = $manager->createFromJson($json)->update();
        $this->assertEquals("new-name", $result->getName());
    }

    public function testCanDeleteClient()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createClientProtocolMapperManager($client);

        $this->assertNull(
            $manager->delete('idMyClient')
        );
    }

    protected function createClientProtocolMapperManager($clientHTTP = null) : ClientProtocolMapperManager
    {
        if (null === $clientHTTP) {
            $clientHTTP = $this->createStubClient();
        }

        return new ClientProtocolMapperManager(
            $clientHTTP,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            'master',
            'idOfResource'
        );
    }
}
