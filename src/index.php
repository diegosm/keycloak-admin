<?php

require "vendor/autoload.php";

use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader('class_exists');

$serializer = JMS\Serializer\SerializerBuilder::create()->build();

echo "\n\n\n\n";

$data = '
{
        "id": "1a69e9e4-8a62-4b98-a62a-8aa4ce8b1524",
        "clientId": "account",
        "name": "${client_account}",
        "rootUrl": "${authBaseUrl}",
        "baseUrl": "/realms/learningApp/account/",
        "surrogateAuthRequired": false,
        "enabled": true,
        "alwaysDisplayInConsole": false,
        "clientAuthenticatorType": "client-secret",
        "defaultRoles": [
            "manage-account",
            "view-profile"
        ],
        "redirectUris": [
            "/realms/learningApp/account/*"
        ],
        "webOrigins": [],
        "notBefore": 0,
        "bearerOnly": false,
        "consentRequired": false,
        "standardFlowEnabled": true,
        "implicitFlowEnabled": false,
        "directAccessGrantsEnabled": false,
        "serviceAccountsEnabled": false,
        "publicClient": false,
        "frontchannelLogout": false,
        "protocol": "openid-connect",
        "attributes": {},
        "authenticationFlowBindingOverrides": {},
        "fullScopeAllowed": false,
        "nodeReRegistrationTimeout": 0,
        "protocolMappers": [
            {
                "id": "89826bad-4532-42ed-9b2c-a10e2f22d361",
                "name": "testeeeee",
                "protocol": "openid-connect",
                "protocolMapper": "oidc-usermodel-attribute-mapper",
                "consentRequired": false,
                "config": {
                    "userinfo.token.claim": "true",
                    "user.attribute": "abc",
                    "id.token.claim": "true",
                    "access.token.claim": "true",
                    "claim.name": "abc",
                    "jsonType.label": "String"
                }
            }
        ],
        "defaultClientScopes": [
            "web-origins",
            "role_list",
            "roles",
            "profile",
            "email"
        ],
        "optionalClientScopes": [
            "address",
            "phone",
            "offline_access",
            "microprofile-jwt"
        ],
        "access": {
            "view": true,
            "configure": true,
            "manage": true
        }
    }
';

$object = $serializer->deserialize($data, \KeycloakAdmin\Clients\Client::class, 'json');

var_dump($object->getProtocolMappers());

echo "\n\n\n\n";