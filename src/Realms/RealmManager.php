<?php

declare(strict_types=1);

namespace KeycloakAdmin\Realms;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Exceptions\InvalidRealmException;
use KeycloakAdmin\Exceptions\InvalidRequestException;
use KeycloakAdmin\Exceptions\RealmDeleteException;
use KeycloakAdmin\Exceptions\RealmNotFoundException;
use KeycloakAdmin\Exceptions\RealmSaveErrorException;
use KeycloakAdmin\Exceptions\RealmUpdateException;
use KeycloakAdmin\KeycloakAdminConfig;
use KeycloakAdmin\KeycloakAuth;
use KeycloakAdmin\Traits\CreatableTrait;

/**
 * Class RealmManager
 *
 * Due to possible of delay/waiting time to process your operations
 * on keycloak server, we cant retrieve inserted/updated data from
 * keycloak server, IT SHOULD RETURN the realm that you pass before
 * this operation otherwise if have any error you will
 * receive and exception
 *
 * @package KeycloakAdmin\Realms
 */
class RealmManager
{
    use CreatableTrait;

    /** @var Client */
    private $client;

    /** @var KeycloakAdminConfig */
    private $keycloakAdminConfig;

    /** @var SerializerInterface */
    private $serializer;

    /** @var KeycloakAuth */
    private $keycloakAuth;

    /** @var Realm */
    private $resource;

    /**
     * RealmManager constructor.
     *
     * @param Client $client
     * @param KeycloakAdminConfig $keycloakAdminConfig
     * @param SerializerInterface $serializer
     * @param KeycloakAuth $keycloakAuth
     */
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

    /**
     * @return RealmCollection
     * @throws InvalidRequestException
     */
    public function list() : RealmCollection
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
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

    /**
     * @return Realm
     * @throws InvalidRealmException
     * @throws RealmSaveErrorException
     */
    public function save() : Realm
    {
        if (empty($this->resource)) {
            throw new InvalidRealmException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
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

        return $this->resource;
    }

    /**
     * @param string $realmName
     * @return Realm
     * @throws RealmNotFoundException
     */
    public function show(string $realmName) : Realm
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
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

    /**
     * @return Realm
     * @throws InvalidRealmException
     * @throws RealmNotFoundException
     * @throws RealmUpdateException
     */
    public function update() : Realm
    {
        if (empty($this->resource)) {
            throw new InvalidRealmException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'PUT',
                $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->resource->getRealm()),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new RealmUpdateException();
            }
        } catch (\Exception $exception) {
            throw new RealmUpdateException();
        }

        return $this->show($this->resource->getRealm());
    }

    /**
     * @param string $realmName
     * @throws RealmDeleteException
     */
    public function delete(string $realmName) : void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        try {
            $request = $this->client->request(
                'DELETE',
                $this->keycloakAdminConfig->getUrl('admin/realms/' . $realmName),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new RealmDeleteException();
            }
        } catch (\Exception $exception) {
            throw new RealmDeleteException();
        }

        return;
    }

    /**
     * @return Realm
     * @throws RealmNotFoundException
     */
    public function getRealm() : Realm
    {
        if (empty($this->resource)) {
            throw new RealmNotFoundException();
        }

        return $this->resource;
    }

    /**
     * @param string $data
     * @return Realm
     */
    private function deserialize(string $data) : Realm
    {
        return $this->serializer->deserialize($data, Realm::class, 'json');
    }
}
