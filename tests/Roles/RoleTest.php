<?php

declare(strict_types=1);

namespace Tests\Roles;

use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\Roles\Role;
use KeycloakAdmin\Roles\RoleCollection;
use KeycloakAdmin\Roles\RoleManager;
use Tests\BaseTest;

class RoleTest extends BaseTest
{
    public function testItCanListUsers()
    {
        $client = $this->createStubClient('Roles/list.json');

        $manager = $this->createRoleManager($client);

        $result = $manager->list();

        $this->assertInstanceOf(RoleCollection::class, $result);

        $this->assertEquals($result->getRoles()[0]->getId(), 'd99e9834-fc42-4041-a38c-72caebcb857a');
    }

    public function testItCanSaveRole()
    {
        $client = $this->createStubClient('', 201);

        $manager = $this->createRoleManager($client);

        $json = '{"username": "diego@email.com"}';

        $result = $manager->createFromJson($json)->save();

        $this->assertInstanceOf(Role::class, $result);
    }

    public function testItCanShowRole()
    {
        $client = $this->createStubClient('Roles/show.json', 200);

        $manager = $this->createRoleManager($client);

        $result = $manager->show('fb2f0f35-ca93-48dc-96fc-4a29c8f2f734');

        $this->assertInstanceOf(Role::class, $result);

        $this->assertEquals('lalala-lalalala-lalalala', $result->getId());
    }

    public function testItCanUpdateRole()
    {
        $json = '{
            "name": "manage-something",
            "description": "La descripcion",
            "composite": false,
            "clientRole": true,
            "containerId": "Oque é isso",
            "id": "lalala-lalalala-lalalala"
        }';

        $updateResponse = new Response(
            204,
            [],
            $json
        );

        $showResponse = new Response(
            200,
            [],
            file_get_contents('tests/Stubs/Roles/update.json')
        );

        $client = $this->getMockBuilder(\GuzzleHttp\Client::class)->getMock();
        $client->expects($this->at(0))
            ->method('request')
            ->willReturn($updateResponse);

        $client->expects($this->at(1))
            ->method('request')
            ->willReturn($showResponse);

        $manager = $this->createRoleManager($client);

        $result = $manager->createFromJson($json)->update();
        $this->assertEquals("manage-something", $result->getName());
    }

    public function testItCanDeleteRole()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createRoleManager($client);

        $this->assertNull(
            $manager->delete('fdca49c1-80c8-4492-9c97-e808202f87dd')
        );
    }

    protected function createRoleManager($clientHTTP = null) : RoleManager
    {
        if (null === $clientHTTP) {
            $clientHTTP = $this->createStubClient();
        }

        return new RoleManager(
            $clientHTTP,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            'master'
        );
    }
}
