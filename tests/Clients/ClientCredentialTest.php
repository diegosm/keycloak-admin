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

        $result = $manager->credentials('123-456-789-987')->get();

        $this->assertInstanceOf(CredentialRepresentation::class, $result);
    }

    public function testItCanCreateAutomaticallyNewCredential()
    {
        $client = $this->createStubClient('Clients/client-secret.json', 200);

        $manager = $this->createClientManager($client);

        $result = $manager->credentials('my-cli')->generate();

        $this->assertInstanceOf(CredentialRepresentation::class, $result);

        $this->assertEquals('4a8157c6-d819-4784-b5af-37cd35989829', $result->getValue());
    }

    public function testItCanSetCredential()
    {
        $client = $this->createStubClient('Clients/client-secret.json', 200);

        $manager = $this->createClientManager($client);

        $credentials = [
            'type' => 'secret',
            'value' => 'password'
        ];

        $result = $manager->credentials('123-456-789-987')->createFromArray($credentials)->save();

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
