<?php

declare(strict_types=1);

namespace KeycloakAdmin;

use GuzzleHttp\Client;

use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Exception\UnauthorizedException;
use KeycloakAdmin\Realms\RealmManager;

class KeycloakAdmin
{
    /** @var Client */
    private $client;

    /** @var KeycloakAdminConfig */
    private $keycloakAdminConfig;

    /** @var SerializerInterface */
    private $serializer;

    /** @var KeycloakAuth */
    private $keycloakAuth;

    public function __construct(
        Client $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer
    ) {
        $this->client              = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;

        $this->login();
    }

    private function login() : void
    {
        $data = [
            'form_params' => [
                'username' => $this->keycloakAdminConfig->getUsername(),
                'password' => $this->keycloakAdminConfig->getPassword(),
                'grant_type' => 'password',
                'client_id' => 'admin-cli'
            ]
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->keycloakAdminConfig->getUrl('realms/master/protocol/openid-connect/token'),
                $data
            );

            if ($request->getStatusCode() === 200) {
                $this->keycloakAuth = $this->serializer->deserialize(
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

    public function realm() : RealmManager
    {
        return new RealmManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth
        );
    }

    public function client()
    {

    }
}