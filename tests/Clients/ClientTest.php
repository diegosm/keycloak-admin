<?php

declare(strict_types=1);

namespace Tests\Clients;

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

    protected function createClientManager($clientHTTP) : ClientManager
    {
        return new ClientManager(
            $clientHTTP,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            'master'
        );
    }
}