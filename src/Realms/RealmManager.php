<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Exception\InvalidRequestException;
use KeycloakAdmin\KeycloakAdminConfig;
use KeycloakAdmin\KeycloakAuth;

class RealmManager
{
    /** @var Client */
    private $client;

    /** @var KeycloakAdminConfig */
    private $keycloakAdminConfig;

    /** @var SerializerInterface */
    private $serializer;

    /** @var KeycloakAuth */
    private $keycloakAuth;

    public function __construct(
        Client $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth
    ) {
        $this->client              = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;
        $this->keycloakAuth        = $keycloakAuth;
    }

    public function list() : RealmCollection
    {
        $data = [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->keycloakAuth->getAccessToken()
            ]
        ];

        $request = $this->client->request(
            'GET',
            $this->keycloakAdminConfig->getUrl('admin/realms'),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new InvalidRequestException();
        }

        return $this->serializer->deserialize(
            $request->getBody()->getContents(),
            RealmCollection::class,
            'json'
        );
    }

    public function create(Realm $realm)
    {
        
    }

    public function show(Realm $realm)
    {

    }

    public function update(Realm $realm)
    {
        
    }

    public function delete(Realm $realm)
    {
        
    }
}