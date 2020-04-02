<?php

declare(strict_types=1);

namespace Tests;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client as ClientHTTP;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\KeycloakAdminConfig;
use KeycloakAdmin\KeycloakAuth;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    /** @var KeycloakAdminConfig */
    protected $keycloakAdminConfig;

    /** @var SerializerInterface */
    protected $serializer;

    /** @var KeycloakAuth */
    protected $keycloakAuth;

    protected function setUp(): void
    {
        parent::setUp();
        AnnotationRegistry::registerLoader('class_exists');

        $this->keycloakAdminConfig = new KeycloakAdminConfig(
            'manager-cli',
            '3a258032-69f9-402c-b1eb-706f700d652d',
            'http://keycloak:8080/auth'
        );

        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $this->keycloakAuth = new KeycloakAuth();
    }

    protected function createStubClient(string $file = '', int $HTTPStatus = 200)
    {
        $client = $this->createStub(ClientHTTP::class);

        if (empty($file)) {
            $response = new Response(
                $HTTPStatus,
                [],
                null
            );
        } else {
            $response = new Response(
                $HTTPStatus,
                [],
                file_get_contents('tests/Stubs/' . $file)
            );
        }

        $client->method('request')->willReturn($response);

        return $client;
    }
}