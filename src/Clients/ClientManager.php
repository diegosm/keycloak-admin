<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use GuzzleHttp\Client as ClientHttp;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Clients\Exceptions\ClientDeleteException;
use KeycloakAdmin\Clients\Exceptions\ClientInvalidException;
use KeycloakAdmin\Clients\Exceptions\ClientNotFoundException;
use KeycloakAdmin\Clients\Exceptions\ClientSaveException;
use KeycloakAdmin\Clients\Exceptions\ClientUpdateException;
use KeycloakAdmin\Keycloak\Exceptions\RequestInvalidException;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Traits\CreatableTrait;

class ClientManager
{
    use CreatableTrait;

    /** @var ClientHttp */
    private $clientHttp;

    /** @var KeycloakAdminConfig */
    private $keycloakAdminConfig;

    /** @var SerializerInterface */
    private $serializer;

    /** @var KeycloakAuth */
    private $keycloakAuth;

    /** @var string */
    private $realmName;

    /** @var Client */
    private $resource;

    /**
     * ClientManager constructor.
     * @param ClientHttp $clientHttp
     * @param KeycloakAdminConfig $keycloakAdminConfig
     * @param SerializerInterface $serializer
     * @param KeycloakAuth $keycloakAuth
     * @param string $realmName
     */
    public function __construct(
        ClientHttp $clientHttp,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName
    ) {
        $this->clientHttp = $clientHttp;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer = $serializer;
        $this->keycloakAuth = $keycloakAuth;
        $this->realmName = $realmName;
    }

    /**
     * @return ClientCollection
     * @throws RequestInvalidException
     */
    public function list(): ClientCollection
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->clientHttp->request(
            'GET',
            $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->realmName . '/clients'),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RequestInvalidException();
        }

        return $this->serializer->deserialize(
            $request->getBody()->getContents(),
            ClientCollection::class,
            'json'
        );
    }

    /**
     * @return Client
     * @throws ClientInvalidException
     * @throws ClientSaveException
     */
    public function save(): Client
    {
        if (empty($this->resource)) {
            throw new ClientInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->clientHttp->request(
                'POST',
                $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->realmName . '/clients'),
                $data
            );

            if ($request->getStatusCode() !== 201) {
                throw new ClientSaveException();
            }
        } catch (\Exception $exception) {
            throw new ClientSaveException();
        }

        return $this->resource;
    }

    /**
     * @param string $idOfClient
     * @return Client
     * @throws ClientNotFoundException
     */
    public function show(string $idOfClient): Client
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        $request = $this->clientHttp->request(
            'GET',
            $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->realmName . '/clients/' . $idOfClient),
            $data
        );


        if ($request->getStatusCode() !== 200) {
            throw new ClientNotFoundException();
        }

        return $this->deserialize($request->getBody()->getContents());
    }

    /**
     * @return Client
     * @throws ClientInvalidException
     * @throws ClientNotFoundException
     * @throws ClientUpdateException
     */
    public function update(): Client
    {
        if (empty($this->resource)) {
            throw new ClientInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->clientHttp->request(
                'PUT',
                $this->keycloakAdminConfig->getUrl(
                    'admin/realms/' . $this->realmName . '/clients/' . $this->resource->getId()
                ),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new ClientUpdateException();
            }
        } catch (\Exception $exception) {
            throw new ClientUpdateException();
        }

        return $this->show($this->resource->getId());
    }

    /**
     * @param string $idOfClient
     * @throws ClientDeleteException
     */
    public function delete(string $idOfClient) : void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        try {
            $request = $this->clientHttp->request(
                'DELETE',
                $this->keycloakAdminConfig->getUrl(
                    'admin/realms/' . $this->realmName . '/clients/' . $idOfClient
                ),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new ClientDeleteException();
            }
        } catch (\Exception $exception) {
            throw new ClientDeleteException();
        }

        return;
    }

    /**
     * @return Client
     * @throws ClientNotFoundException
     */
    public function getClient() : Client
    {
        if (empty($this->resource)) {
            throw new ClientNotFoundException();
        }

        return $this->resource;
    }
    private function deserialize(string $data) : Client
    {
        return $this->serializer->deserialize($data, Client::class, 'json');
    }
}
