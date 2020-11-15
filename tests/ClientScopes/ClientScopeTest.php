<?php

declare(strict_types=1);

namespace Tests\ClientScopes;

use GuzzleHttp\Psr7\Response;
use KeycloakAdmin\ClientScopes\ClientScope;
use KeycloakAdmin\ClientScopes\ClientScopeCollection;
use KeycloakAdmin\ClientScopes\ClientScopeManager;
use KeycloakAdmin\ClientScopes\ClientScopeProtocolMapperManager;
use KeycloakAdmin\ProtocolMappers\ProtocolMapperCollection;
use Tests\BaseTest;

class ClientScopeTest extends BaseTest
{
    public function testItCanListClientScopes()
    {
        $client = $this->createStubClient('ClientScopes/list.json');

        $manager = $this->createClientScopeManager($client);

        $result = $manager->list();

        $this->assertInstanceOf(ClientScopeCollection::class, $result);
    }

    public function testCanCreatClientFromArray()
    {
        $config = [
            'id' => 'myCli',
            'name' => 'scope',
            'description' => 'protocol mapper scope',
            'attributes' => [
                'include.in.token.scope' => true,
                'display.on.consent.screen' => true,
                'consent.screen.text' => 'text'
            ]
        ];

        $manager = $this->createClientScopeManager();

        $result = $manager->createFromArray($config);

        $this->assertInstanceOf(ClientScope::class, $result->getClientScope());

        $this->assertEquals([
            'include.in.token.scope' => true,
            'display.on.consent.screen' => true,
            'consent.screen.text' => 'text'
        ], $result->getClientScope()->getAttributes());
    }

    public function testCanCreatClientScopeFromJson()
    {
        $json = '{
            "id": "ca57ceee-78f5-4314-b6c7-f805b3b235fb",
            "name": "address",
            "description": "OpenID Connect built-in scope: address",
            "protocol": "openid-connect",
            "attributes": {
              "include.in.token.scope": "true",
              "display.on.consent.screen": "true",
              "consent.screen.text": "${addressScopeConsentText}"
            },
            "protocolMappers": [
              {
                "id": "64ae07b3-dda2-47f8-955f-6aa38698a8c9",
                "name": "address",
                "protocol": "openid-connect",
                "protocolMapper": "oidc-address-mapper",
                "consentRequired": false,
                "config": {
                  "user.attribute.formatted": "formatted",
                  "user.attribute.country": "country",
                  "user.attribute.postal_code": "postal_code",
                  "userinfo.token.claim": "true",
                  "user.attribute.street": "street",
                  "id.token.claim": "true",
                  "user.attribute.region": "region",
                  "access.token.claim": "true",
                  "user.attribute.locality": "locality"
                }
              }
            ]
          }';

        $manager = $this->createClientScopeManager();

        $result = $manager->createFromJson($json);

        $this->assertInstanceOf(ClientScope::class, $result->getClientScope());
        $this->assertInstanceOf(
            ProtocolMapperCollection::class,
            $result->getClientScope()->getProtocolMappers()
        );
    }

    public function testItCanSaveClient()
    {
        $json = '{"id": "0be0847b-fbc8-44db-afac-d52323463f3f", "name": "my-scope"}';

        $client = $this->createStubClient('', 201);

        $manager = $this->createClientScopeManager($client);

        $result = $manager->createFromJson($json)->save();

        $this->assertInstanceOf(ClientScope::class, $result);

        $this->assertEquals("my-scope", $result->getName());
    }

    public function testItCanShowClientScopeDetails()
    {
        $client = $this->createStubClient('ClientScopes/show.json');

        $manager = $this->createClientScopeManager($client);

        $result = $manager->show('my-client-scope-id');

        $this->assertInstanceOf(ClientScope::class, $result);
    }

    public function testCanUpdateClientInfo()
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
            file_get_contents('tests/Stubs/ClientScopes/update.json')
        );

        $client = $this->getMockBuilder(\GuzzleHttp\Client::class)->getMock();
        $client->expects($this->at(0))
            ->method('request')
            ->willReturn($updateResponse);

        $client->expects($this->at(1))
            ->method('request')
            ->willReturn($showResponse);

        $manager = $this->createClientScopeManager($client);

        $result = $manager->createFromJson($json)->update();
        $this->assertEquals("address", $result->getName());
    }

    public function testCanDeleteClientScopes()
    {
        $client = $this->createStubClient('', 204);

        $manager = $this->createClientScopeManager($client);

        $this->assertNull(
            $manager->delete('idMyClient')
        );
    }

    public function testItMustHaveProtocolMapperManager()
    {
        $manager = $this->createClientScopeManager();

        $this->assertInstanceOf(
            ClientScopeProtocolMapperManager::class,
            $manager->protocolMappers('123')
        );
    }

    protected function createClientScopeManager($clientHTTP = null) : ClientScopeManager
    {
        if (null === $clientHTTP) {
            $clientHTTP = $this->createStubClient();
        }

        return new ClientScopeManager(
            $clientHTTP,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            'master'
        );
    }
}
