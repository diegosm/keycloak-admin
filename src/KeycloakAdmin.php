<?php

declare(strict_types=1);

namespace KeycloakAdmin;

use GuzzleHttp\Client;

use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Clients\ClientManager;
use KeycloakAdmin\ClientScopes\ClientScopeManager;
use KeycloakAdmin\Keycloak\Exceptions\UnauthorizedException;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Realms\RealmManager;
use KeycloakAdmin\Roles\RoleManager;
use KeycloakAdmin\Users\UserManager;

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

    /**
     * KeycloakAdmin constructor.
     * @param Client $client
     * @param KeycloakAdminConfig $keycloakAdminConfig
     * @param SerializerInterface $serializer
     * @throws UnauthorizedException
     */
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

    /**
     * Login method used for get keycloak access
     * @throws UnauthorizedException
     */
    private function login() : void
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

    /**
     * @return RealmManager
     */
    public function realm() : RealmManager
    {
        return new RealmManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth
        );
    }

    /**
     * @param string $realmName
     * @return ClientManager
     */
    public function client(string $realmName) : ClientManager
    {
        return new ClientManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            $realmName
        );
    }

    /**
     * @param string $realmName
     * @return ClientScopeManager
     */
    public function clientScope(string $realmName) : ClientScopeManager
    {
        return new ClientScopeManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            $realmName
        );
    }

    /**
     * @param string $realmName
     * @return RoleManager
     */
    public function role(string $realmName) : RoleManager
    {
        return new RoleManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            $realmName
        );
    }

    /**
     * @param string $realmName
     * @return UserManager
     */
    public function user(string $realmName) : UserManager
    {
        return new UserManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            $realmName
        );
    }
}
