<?php

declare(strict_types=1);

namespace KeycloakAdmin\Roles;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Keycloak\Exceptions\RequestInvalidException;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Keycloak\Traits\CreatableTrait;
use KeycloakAdmin\Roles\Exceptions\RoleDeleteException;
use KeycloakAdmin\Roles\Exceptions\RoleInvalidException;
use KeycloakAdmin\Roles\Exceptions\RoleNotFoundException;
use KeycloakAdmin\Roles\Exceptions\RoleSaveException;
use KeycloakAdmin\Roles\Exceptions\RoleUpdateException;

abstract class AbstractRoleManager
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
    protected $idOfClient;

    /** @var Role */
    protected $resource;

    public function __construct(
        Client $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName,
        string $idOfClient = ''
    ) {
        $this->client              = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;
        $this->keycloakAuth        = $keycloakAuth;
        $this->realmName           = $realmName;
        $this->idOfClient          = $idOfClient;
    }

    /**
     * @return RoleCollection
     * @throws RequestInvalidException
     */
    public function list() : RoleCollection
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->client->request(
            'GET',
            $this->getBaseUrl(),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RequestInvalidException();
        }

        return $this->serializer->deserialize(
            $request->getBody()->getContents(),
            RoleCollection::class,
            'json'
        );
    }

    /**
     * @return Role
     * @throws RoleInvalidException
     * @throws RoleNotFoundException
     * @throws RoleSaveException
     */
    public function save() : Role
    {
        if (empty($this->resource)) {
            throw new RoleInvalidException();
        }
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->getBaseUrl(),
                $data
            );

            if ($request->getStatusCode() !== 201) {
                throw new RoleSaveException();
            }
        } catch (\Exception $exception) {
            throw new RoleSaveException();
        }

        return $this->getRole();
    }

    /**
     * @param string $roleName
     * @return Role
     * @throws RoleNotFoundException
     */
    public function show(string $roleName) : Role
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        $request = $this->client->request(
            'GET',
            $this->getBaseUrl($roleName),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RoleNotFoundException();
        }

        return $this->deserialize($request->getBody()->getContents());
    }

    /**
     * @return Role
     * @throws RoleInvalidException
     * @throws RoleNotFoundException
     * @throws RoleUpdateException
     */
    public function update() : Role
    {
        if (empty($this->resource)) {
            throw new RoleInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'PUT',
                $this->getBaseUrl($this->resource->getName()),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new RoleUpdateException();
            }
        } catch (\Exception $exception) {
            throw new RoleUpdateException();
        }

        return $this->show($this->resource->getName());
    }

    /**
     * @param string $roleName
     * @throws RoleDeleteException
     */
    public function delete(string $roleName) : void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        try {
            $request = $this->client->request(
                'DELETE',
                $this->getBaseUrl($roleName),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new RoleDeleteException();
            }
        } catch (\Exception $exception) {
            throw new RoleDeleteException();
        }

        return;
    }

    public function getRole() : Role
    {
        if (empty($this->resource)) {
            throw new RoleNotFoundException();
        }

        return $this->resource;
    }

    protected function deserialize(string $data) : Role
    {
        return $this->serializer->deserialize($data, Role::class, 'json');
    }

    abstract protected function getBaseUrl(string $path = '') : string;
}
