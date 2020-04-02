# keycloak-admin
PHP Library for Keycloak Rest API management

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
1. Make users management
2. Make roles management
3. Review and make tests for all exceptions
4. Make realm extra endpoints (i.e. clear sessions)
5. Make documentation
