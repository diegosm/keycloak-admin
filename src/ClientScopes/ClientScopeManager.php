<?php

declare(strict_types=1);

namespace KeycloakAdmin\ClientScopes;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\ClientScopes\Exceptions\ClientScopeDeleteException;
use KeycloakAdmin\ClientScopes\Exceptions\ClientScopeInvalidException;
use KeycloakAdmin\ClientScopes\Exceptions\ClientScopeNotFoundException;
use KeycloakAdmin\ClientScopes\Exceptions\ClientScopeSaveException;
use KeycloakAdmin\ClientScopes\Exceptions\ClientScopeUpdateException;
use KeycloakAdmin\Keycloak\Exceptions\RequestInvalidException;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Keycloak\Traits\CreatableTrait;

class ClientScopeManager
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

    /** @var string */
    private $realmName;

    /** @var ClientScope */
    private $resource;

    /**
     * ClientManager constructor.
     * @param Client $client
     * @param KeycloakAdminConfig $keycloakAdminConfig
     * @param SerializerInterface $serializer
     * @param KeycloakAuth $keycloakAuth
     * @param string $realmName
     */
    public function __construct(
        Client $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName
    ) {
        $this->client = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer = $serializer;
        $this->keycloakAuth = $keycloakAuth;
        $this->realmName = $realmName;
    }

    /**
     * @return ClientScopeCollection
     * @throws RequestInvalidException
     */
    public function list() : ClientScopeCollection
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->client->request(
            'GET',
            $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->realmName . '/client-scopes'),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RequestInvalidException();
        }

        return $this->serializer->deserialize(
            $request->getBody()->getContents(),
            ClientScopeCollection::class,
            'json'
        );
    }

    /**
     * @return ClientScope
     * @throws ClientScopeInvalidException
     * @throws ClientScopeSaveException
     */
    public function save() : ClientScope
    {
        if (empty($this->resource)) {
            throw new ClientScopeInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->realmName . '/client-scopes'),
                $data
            );

            if ($request->getStatusCode() !== 201) {
                throw new ClientScopeSaveException();
            }
        } catch (\Exception $exception) {
            throw new ClientScopeSaveException();
        }

        return $this->resource;
    }

    /**
     * @param string $id
     * @return ClientScope
     * @throws ClientScopeNotFoundException
     */
    public function show(string $id) : ClientScope
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->client->request(
            'GET',
            $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->realmName . '/client-scopes/' . $id),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new ClientScopeNotFoundException();
        }

        return $this->deserialize($request->getBody()->getContents());
    }

    /**
     * @return ClientScope
     * @throws ClientScopeInvalidException
     * @throws ClientScopeNotFoundException
     * @throws ClientScopeUpdateException
     */
    public function update() : ClientScope
    {
        if (empty($this->resource)) {
            throw new ClientScopeInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'PUT',
                $this->keycloakAdminConfig->getUrl(
                    'admin/realms/' . $this->realmName . '/client-scopes/' . $this->resource->getId()
                ),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new ClientScopeUpdateException();
            }
        } catch (\Exception $exception) {
            throw new ClientScopeUpdateException();
        }

        return $this->show($this->resource->getId());
    }

    /**
     * @param string $id
     * @throws ClientScopeDeleteException
     */
    public function delete(string $id) : void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        try {
            $request = $this->client->request(
                'DELETE',
                $this->keycloakAdminConfig->getUrl('admin/realms/' . $this->realmName . '/client-scopes/' . $id),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new ClientScopeDeleteException();
            }
        } catch (\Exception $exception) {
            throw new ClientScopeDeleteException();
        }

        return;
    }

    /**
     * @param string $idOfClientScope
     * @return ClientScopeProtocolMapperManager
     */
    public function protocolMappers(string $idOfClientScope) : ClientScopeProtocolMapperManager
    {
        return new ClientScopeProtocolMapperManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            $this->realmName,
            $idOfClientScope
        );
    }

    /**
     * @return ClientScope
     * @throws ClientScopeNotFoundException
     */
    public function getClientScope() : ClientScope
    {
        if (empty($this->resource)) {
            throw new ClientScopeNotFoundException();
        }

        return $this->resource;
    }

    private function deserialize(string $data) : ClientScope
    {
        return $this->serializer->deserialize($data, ClientScope::class, 'json');
    }
}
