<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use GuzzleHttp\Client as ClientHttp;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Clients\Exceptions\ClientSaveCredentialRepresentationException;
use KeycloakAdmin\Credentials\CredentialRepresentation;
use KeycloakAdmin\Keycloak\Exceptions\RequestInvalidException;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Traits\CreatableTrait;

class ClientCredentialManager
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

    /** @var string */
    private $idOfClient;

    /** @var CredentialRepresentation */
    private $resource;

    /**
     * ClientCredentialManager constructor.
     * @param ClientHttp $clientHttp
     * @param KeycloakAdminConfig $keycloakAdminConfig
     * @param SerializerInterface $serializer
     * @param KeycloakAuth $keycloakAuth
     * @param string $realmName
     * @param string $idOfClient
     */
    public function __construct(
        ClientHttp $clientHttp,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName,
        string $idOfClient
    ) {
        $this->clientHttp = $clientHttp;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer = $serializer;
        $this->keycloakAuth = $keycloakAuth;
        $this->realmName = $realmName;
        $this->idOfClient = $idOfClient;
    }

    /**
     * You can pass a new CredentialRepresentation or simply generate one automatically
     *
     * @return CredentialRepresentation
     * @throws ClientSaveCredentialRepresentationException
     * @throws RequestInvalidException
     */
    public function save() : CredentialRepresentation
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => ! empty($this->resource) ? $this->resource->toArray() : null
        ];

        try {
            $request = $this->clientHttp->request(
                'POST',
                $this->keycloakAdminConfig->getUrl(
                    'admin/realms/' . $this->realmName . '/clients/' . $this->idOfClient . '/client-secret'
                ),
                $data
            );

            if ($request->getStatusCode() !== 200) {
                throw new ClientSaveCredentialRepresentationException();
            }
        } catch (\Exception $exception) {
            throw new ClientSaveCredentialRepresentationException();
        }

        return $this->get();
    }

    /**
     * This is to keep pattern of keycloak rest api
     * https://www.keycloak.org/docs-api/5.0/rest-api/index.html#_clients_resource
     *
     * @return CredentialRepresentation
     * @throws ClientSaveCredentialRepresentationException
     * @throws RequestInvalidException
     */
    public function generate() : CredentialRepresentation
    {
        return $this->save();
    }

    public function get() : CredentialRepresentation
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->clientHttp->request(
            'GET',
            $this->keycloakAdminConfig->getUrl(
                'admin/realms/' . $this->realmName . '/clients/' . $this->idOfClient . '/client-secret'
            ),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RequestInvalidException();
        }

        return $this->deserialize($request->getBody()->getContents());
    }

    private function deserialize(string $data = '') : CredentialRepresentation
    {
        return $this->serializer->deserialize($data, CredentialRepresentation::class, 'json');
    }
}
