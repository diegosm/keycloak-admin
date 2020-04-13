<?php

declare(strict_types=1);

namespace KeycloakAdmin\ProtocolMappers;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Keycloak\Exceptions\RequestInvalidException;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\ProtocolMappers\Exceptions\ProtocolMapperDeleteException;
use KeycloakAdmin\ProtocolMappers\Exceptions\ProtocolMapperInvalidException;
use KeycloakAdmin\ProtocolMappers\Exceptions\ProtocolMapperNotFoundException;
use KeycloakAdmin\ProtocolMappers\Exceptions\ProtocolMapperSaveException;
use KeycloakAdmin\ProtocolMappers\Exceptions\ProtocolMapperUpdateException;
use KeycloakAdmin\Keycloak\Traits\CreatableTrait;

abstract class AbstractProtocolMapperManager
{
    use CreatableTrait;

    /** @var Client */
    protected $client;

    /** @var KeycloakAdminConfig */
    protected $keycloakAdminConfig;

    /** @var SerializerInterface */
    protected $serializer;

    /** @var KeycloakAuth */
    protected $keycloakAuth;

    /** @var string */
    protected $realmName;

    /** @var string */
    protected $idOfResource;

    /** @var ProtocolMapper */
    protected $resource;

    /**
     * ClientManager constructor.
     * @param Client $client
     * @param KeycloakAdminConfig $keycloakAdminConfig
     * @param SerializerInterface $serializer
     * @param KeycloakAuth $keycloakAuth
     * @param string $realmName
     * @param string $idOfResource
     */
    public function __construct(
        Client $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName,
        string $idOfResource
    ) {
        $this->client = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer = $serializer;
        $this->keycloakAuth = $keycloakAuth;
        $this->realmName = $realmName;
        $this->idOfResource = $idOfResource;
    }

    /**
     * @return ProtocolMapperCollection
     * @throws RequestInvalidException
     */
    public function list(): ProtocolMapperCollection
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->client->request(
            'GET',
            $this->getUrl(),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RequestInvalidException();
        }

        return $this->serializer->deserialize(
            $request->getBody()->getContents(),
            ProtocolMapperCollection::class,
            'json'
        );
    }

    /**
     * @return ProtocolMapper
     * @throws ProtocolMapperInvalidException
     * @throws ProtocolMapperSaveException
     */
    public function save(): ProtocolMapper
    {
        if (empty($this->resource)) {
            throw new ProtocolMapperInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->getUrl(),
                $data
            );

            if ($request->getStatusCode() !== 201) {
                throw new ProtocolMapperSaveException();
            }
        } catch (\Exception $exception) {
            throw new ProtocolMapperSaveException();
        }

        return $this->resource;
    }

    /**
     * @param string $id
     * @return ProtocolMapper
     * @throws ProtocolMapperNotFoundException
     */
    public function show(string $id): ProtocolMapper
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->client->request(
            'GET',
            $this->getUrl($id),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new ProtocolMapperNotFoundException();
        }

        return $this->deserialize($request->getBody()->getContents());
    }

    /**
     * @return ProtocolMapper
     * @throws ProtocolMapperInvalidException
     * @throws ProtocolMapperNotFoundException
     * @throws ProtocolMapperUpdateException
     */
    public function update(): ProtocolMapper
    {
        if (empty($this->resource)) {
            throw new ProtocolMapperInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'PUT',
                $this->getUrl($this->resource->getId()),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new ProtocolMapperUpdateException();
            }
        } catch (\Exception $exception) {
            throw new ProtocolMapperUpdateException();
        }

        return $this->show($this->resource->getId());
    }

    /**
     * @param string $id
     * @throws ProtocolMapperDeleteException
     */
    public function delete(string $id): void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        try {
            $request = $this->client->request(
                'DELETE',
                $this->getUrl($id),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new ProtocolMapperDeleteException();
            }
        } catch (\Exception $exception) {
            throw new ProtocolMapperDeleteException();
        }

        return;
    }

    /**
     * @return ProtocolMapper
     * @throws ProtocolMapperInvalidException
     */
    public function getProtocolMapper(): ProtocolMapper
    {
        if (empty($this->resource)) {
            throw new ProtocolMapperInvalidException();
        }

        return $this->resource;
    }

    abstract protected function getUrl(string $path = '') : string;

    protected function deserialize(string $data): ProtocolMapper
    {
        return $this->serializer->deserialize($data, ProtocolMapper::class, 'json');
    }
}
