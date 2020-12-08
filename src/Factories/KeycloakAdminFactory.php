<?php

declare(strict_types=1);

namespace KeycloakAdmin\Factories;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Keycloak\KeycloakLogin;
use KeycloakAdmin\KeycloakAdmin;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;

class KeycloakAdminFactory
{
    public static function create(string $username, string $password, string $url, KeycloakAuth $keycloakAuth = null)
    {
        AnnotationRegistry::registerLoader('class_exists');

        $client  = new Client();

        $keycloakAdminConfig = new KeycloakAdminConfig(
            $username,
            $password,
            $url
        );

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        return new KeycloakAdmin(
            $client,
            $keycloakAdminConfig,
            $serializer,
            new KeycloakLogin(
                $client,
                $keycloakAdminConfig,
                $serializer
            ),
            $keycloakAuth
        );
    }
}
