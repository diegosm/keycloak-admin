<?php

declare(strict_types=1);

namespace Tests\Clients;

use KeycloakAdmin\Clients\ClientManager;
use KeycloakAdmin\Credentials\CredentialRepresentation;
use Tests\BaseTest;

class ClientCredentialTest extends BaseTest
{
    public function testItCanReturnCredential()
    {
        $client = $this->createStubClient('Clients/client-secret.json', 200);

        $manager = $this->createClientManager($client);

        $result = $manager->getClientCredentials('123-456-789-987');

        $this->assertInstanceOf(CredentialRepresentation::class, $result);
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
