<?php

declare(strict_types=1);

namespace KeycloakAdmin\Keycloak;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Keycloak\Exceptions\UnauthorizedException;

class KeycloakLogin
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var KeycloakAdminConfig
     */
    private $keycloakAdminConfig;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(
        Client              $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer
    ) {
        $this->client              = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;
    }

    /**
     * Login method used for get keycloak access
     * @throws UnauthorizedException|\GuzzleHttp\Exception\GuzzleException
     */
    public function login() : KeycloakAuth
    {
        $data = [
            'auth' => [
                $this->keycloakAdminConfig->getUsername(),
                $this->keycloakAdminConfig->getPassword()
            ],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->keycloakAdminConfig->getUrl('realms/master/protocol/openid-connect/token'),
                $data
            );

            if ($request->getStatusCode() === 200) {
                return $this->serializer->deserialize(
                    $request->getBody()->getContents(),
                    KeycloakAuth::class,
                    'json'
                );
            } else {
                throw new UnauthorizedException();
            }
        } catch (\Exception $exception) {
            throw new UnauthorizedException();
        }
    }
}