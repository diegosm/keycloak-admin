<?php

declare(strict_types=1);

namespace Tests;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use KeycloakAdmin\KeycloakAdmin;
use KeycloakAdmin\KeycloakAdminConfig;

class KeycloakAdminTestFactory
{
    public static function create(Client $client, string $username, string $password, string $url)
    {
        AnnotationRegistry::registerLoader('class_exists');

        return new KeycloakAdmin(
            $client,
            new KeycloakAdminConfig(
                $username,
                $password,
                $url
            ),
            \JMS\Serializer\SerializerBuilder::create()->build()
        );
    }
}