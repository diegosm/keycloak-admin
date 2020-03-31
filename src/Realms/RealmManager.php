<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Exceptions\InvalidRealmException;
use KeycloakAdmin\Exceptions\InvalidRequestException;
use KeycloakAdmin\Exceptions\RealmNotFoundException;
use KeycloakAdmin\Exceptions\RealmSaveErrorException;
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

    /** @var Realm */
    private $realm;

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

    public function save() : Realm
    {
        if (empty($this->realm)) {
            throw new InvalidRealmException();
        }

        $data = [
            'headers' => $this->getHeaders(),
            'json' => $this->realm->toArray()
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->keycloakAdminConfig->getUrl('admin/realms'),
                $data
            );

            if ($request->getStatusCode() !== 201) {
                throw new RealmSaveErrorException();
            }
        } catch (\Exception $exception) {
            throw new RealmSaveErrorException();
        }

        return $this->show($this->realm->getRealm());
    }

    public function show(string $realmName) : Realm
    {
        $data = [
            'headers' => $this->getHeaders()
        ];

        $request = $this->client->request(
            'GET',
            $this->keycloakAdminConfig->getUrl('admin/realms/' . $realmName),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RealmNotFoundException();
        }

        return $this->deserialize($request->getBody()->getContents());
    }

    public function update(string $realmName)
    {
        
    }

    public function delete()
    {
        
    }

    public function getRealm() : Realm
    {
        return $this->realm;
    }

    public function createFromArray(array $data = []) : self
    {
        $this->realm = $this->deserialize(json_encode($data));
        return $this;
    }

    public function createFromJson(string $data) : self
    {
        $this->realm = $this->deserialize($data);
        return $this;
    }

    private function deserialize(string $data) : Realm
    {
        return $this->serializer->deserialize($data, Realm::class, 'json');
    }

    private function getHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->keycloakAuth->getAccessToken(),
            'Content-type'  => 'application/json'
        ];
    }
}