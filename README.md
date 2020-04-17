# keycloak-admin
PHP Library for Keycloak Rest API management

## Documentation
The documentation of this project is available at https://keycloak-admin-documentation.readthedocs.io/en/latest/

## Installation
```composer log
composer require diegosm/keycloak-admin
```

## Configure
First of all create a client on master realm, with name like `manager-cli` of type `confidential` and need to enable Service Accounts.
You will use to manage your realm, and log in with client_credential grant type.

There have a factory for create keycloakadmin, put there your configuration:

```php
$keycloakAdmin = KeycloakAdminFactory::create(
    $username, // your confidential client name
    $password, // the client secret
    $url // default root url like http://keycloak:8080/auth
);
```

To do list (Not ordered by priority)
------
1. Create role composites
2. Review and make tests for all exceptions.
3. Make realm extra endpoints (i.e. clear sessions).
4. Change User access from array to a Class.

Create representation classes
____
1. AuthenticationFlowRepresentation (could be used on realm)
2. AuthenticatorConfigRepresentation (could be used on realm)
3. ClientScopeRepresentation (could be used on realm)
4. IdentityProviderMapperRepresentation (could be used on realm)
5. UserFederationMappers (could be used on realm)
____