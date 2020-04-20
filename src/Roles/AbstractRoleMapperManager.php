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

abstract class AbstractRoleMapperManager
{
    use CreatableTrait;

    /** @var Client */
    protected $clientHTTP;

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

    /** @var RoleCollection */
    protected $resource;

    public function __construct(
        Client $clientHTTP,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName,
        string $idOfResource = ''
    ) {
        $this->clientHTTP          = $clientHTTP;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;
        $this->keycloakAuth        = $keycloakAuth;
        $this->realmName           = $realmName;
        $this->idOfResource        = $idOfResource;
    }

    /**
     * @param string $type
     * @return RoleCollection
     * @throws RequestInvalidException
     */
    public function list(string $type = '') : RoleCollection
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->clientHTTP->request(
            'GET',
            $this->getBaseUrl('realm' . $type),
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
     * @return RoleCollection
     * @throws RequestInvalidException
     */
    public function available() : RoleCollection
    {
        return $this->list('/available');
    }

    /**
     * @return RoleCollection
     * @throws RequestInvalidException
     */
    public function composite() : RoleCollection
    {
        return $this->list('/composite');
    }

    /**
     * @return RoleCollection
     * @throws RoleInvalidException
     * @throws RoleNotFoundException
     * @throws RoleSaveException
     */
    public function save() : RoleCollection
    {
        if (empty($this->resource)) {
            throw new RoleInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->clientHTTP->request(
                'POST',
                $this->getBaseUrl('realm'),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new RoleSaveException();
            }
        } catch (\Exception $exception) {
            throw new RoleSaveException();
        }

        return $this->getRole();
    }

    /**
     * @throws RoleDeleteException
     */
    public function delete() : void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->clientHTTP->request(
                'DELETE',
                $this->getBaseUrl('realm'),
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

    /**
     * @return RoleCollection
     * @throws RoleNotFoundException
     */
    public function getRole() : RoleCollection
    {
        if (empty($this->resource)) {
            throw new RoleNotFoundException();
        }

        return $this->resource;
    }

    /**
     * @param string $data
     * @return RoleCollection
     */
    protected function deserialize(string $data) : RoleCollection
    {
        return $this->serializer->deserialize($data, RoleCollection::class, 'json');
    }

    /**
     * @param string $path
     * @return string
     */
    protected function getBaseUrl(string $path = '') : string
    {
        $url  =  'admin/realms/' . $this->realmName. '/' . $this->resourceUrl();
        $url .= '/' . $this->idOfResource . '/role-mappings/' . $path;

        return $this->keycloakAdminConfig->getUrl($url);
    }

    abstract protected function resourceUrl() : string;
}
