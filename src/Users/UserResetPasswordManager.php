<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Credentials\CredentialRepresentation;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Keycloak\Traits\CreatableTrait;
use KeycloakAdmin\Users\Exceptions\UserEmptyCredentialRepresentationException;
use KeycloakAdmin\Users\Exceptions\UserInvalidCredentialRepresentationException;

class UserResetPasswordManager
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

    /** @var string */
    private $id;

    /**
     * @var CredentialRepresentation
     */
    private $resource;

    public function __construct(
        Client $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName,
        string $id
    ) {
        $this->client              = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;
        $this->keycloakAuth        = $keycloakAuth;
        $this->realmName           = $realmName;
        $this->id                  = $id;
    }

    public function save() : void
    {
        if (empty($this->resource)) {
            throw new UserEmptyCredentialRepresentationException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request('PUT', $this->getBaseUrl(), $data);

            if ($request->getStatusCode() !== 204) {
                throw new UserInvalidCredentialRepresentationException();
            }
        } catch (\Exception $exception) {
            throw new UserInvalidCredentialRepresentationException();
        }
    }

    private function getBaseUrl() : string
    {
        return $this->keycloakAdminConfig->getUrl(
            'admin/realms/' . $this->realmName . '/users/' . $this->id . '/reset-password'
        );
    }

    private function deserialize(string $data) : CredentialRepresentation
    {
        return $this->serializer->deserialize($data, CredentialRepresentation::class, 'json');
    }
}
