<?php

declare(strict_types=1);

namespace KeycloakAdmin\Clients;

use GuzzleHttp\Client as ClientHttp;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Exceptions\InvalidRequestException;
use KeycloakAdmin\KeycloakAdminConfig;
use KeycloakAdmin\KeycloakAuth;
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

    public function __construct(
        ClientHttp          $clientHttp,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth        $keycloakAuth,
        string $realmName
    ) {
        $this->clientHttp          = $clientHttp;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;
        $this->keycloakAuth        = $keycloakAuth;
        $this->realmName           = $realmName;
    }

    public function list() : ClientCollection
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
            throw new InvalidRequestException();
        }

        return $this->serializer->deserialize(
            $request->getBody()->getContents(),
            ClientCollection::class,
            'json'
        );
    }
}
