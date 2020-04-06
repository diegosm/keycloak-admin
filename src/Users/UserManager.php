<?php

declare(strict_types=1);

namespace KeycloakAdmin\Users;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use KeycloakAdmin\Keycloak\Exceptions\RequestInvalidException;
use KeycloakAdmin\Keycloak\KeycloakAdminConfig;
use KeycloakAdmin\Keycloak\KeycloakAuth;
use KeycloakAdmin\Traits\CreatableTrait;
use KeycloakAdmin\Users\Exceptions\UserDeleteException;
use KeycloakAdmin\Users\Exceptions\UserInvalidException;
use KeycloakAdmin\Users\Exceptions\UserInvalidLogoutException;
use KeycloakAdmin\Users\Exceptions\UserNotFoundException;
use KeycloakAdmin\Users\Exceptions\UserSaveException;
use KeycloakAdmin\Users\Exceptions\UserUpdateException;
use KeycloakAdmin\Users\Exceptions\UserUsernameRequiredException;

class UserManager
{
    use CreatableTrait;

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

    /**
     * @var KeycloakAuth
     */
    private $keycloakAuth;

    /**
     * @var string
     */
    private $realmName;

    /** @var User */
    private $resource;

    /**
     * UserManager constructor.
     * @param Client $client
     * @param KeycloakAdminConfig $keycloakAdminConfig
     * @param SerializerInterface $serializer
     * @param KeycloakAuth $keycloakAuth
     * @param string $realmName
     */
    public function __construct(
        Client $client,
        KeycloakAdminConfig $keycloakAdminConfig,
        SerializerInterface $serializer,
        KeycloakAuth $keycloakAuth,
        string $realmName
    ) {
        $this->client              = $client;
        $this->keycloakAdminConfig = $keycloakAdminConfig;
        $this->serializer          = $serializer;
        $this->keycloakAuth        = $keycloakAuth;
        $this->realmName           = $realmName;
    }

    /**
     * @return UserCollection
     * @throws RequestInvalidException
     */
    public function list() : UserCollection
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders()
        ];

        $request = $this->client->request(
            'GET',
            $this->getBaseUrl(),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new RequestInvalidException();
        }

        return $this->serializer->deserialize(
            $request->getBody()->getContents(),
            UserCollection::class,
            'json'
        );
    }

    /**
     * @return User
     * @throws UserInvalidException
     * @throws UserNotFoundException
     * @throws UserSaveException
     * @throws UserUsernameRequiredException
     */
    public function save() : User
    {
        if (empty($this->resource)) {
            throw new UserInvalidException();
        }

        if (empty($this->resource->getUsername())) {
            throw new UserUsernameRequiredException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->getBaseUrl(),
                $data
            );

            if ($request->getStatusCode() !== 201) {
                throw new UserSaveException();
            }
        } catch (\Exception $exception) {
            throw new UserSaveException($exception->getMessage());
        }

        return $this->getUser();
    }

    /**
     * @param string $id
     * @return User
     * @throws UserNotFoundException
     */
    public function show(string $id) : User
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        $request = $this->client->request(
            'GET',
            $this->getBaseUrl($id),
            $data
        );

        if ($request->getStatusCode() !== 200) {
            throw new UserNotFoundException();
        }

        return $this->deserialize($request->getBody()->getContents());
    }

    /**
     * @return User
     * @throws UserInvalidException
     * @throws UserNotFoundException
     * @throws UserUpdateException
     */
    public function update() : User
    {
        if (empty($this->resource)) {
            throw new UserInvalidException();
        }

        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
            'json' => $this->resource->toArray()
        ];

        try {
            $request = $this->client->request(
                'PUT',
                $this->getBaseUrl($this->resource->getId()),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new UserUpdateException();
            }
        } catch (\Exception $exception) {
            throw new UserUpdateException();
        }

        return $this->show($this->resource->getId());
    }
    /**
     * @param string $id
     * @throws UserDeleteException
     */
    public function delete(string $id) : void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        try {
            $request = $this->client->request(
                'DELETE',
                $this->getBaseUrl($id),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new UserDeleteException();
            }
        } catch (\Exception $exception) {
            throw new UserDeleteException();
        }

        return;
    }

    /**
     * @param string $id
     * @return UserResetPasswordManager
     */
    public function resetPassword(string  $id) : UserResetPasswordManager
    {
        return new UserResetPasswordManager(
            $this->client,
            $this->keycloakAdminConfig,
            $this->serializer,
            $this->keycloakAuth,
            $this->realmName,
            $id
        );
    }

    /**
     * @param string $id
     * @throws UserInvalidLogoutException
     */
    public function logout(string  $id) : void
    {
        $data = [
            'headers' => $this->keycloakAuth->getDefaultHeaders(),
        ];

        try {
            $request = $this->client->request(
                'POST',
                $this->getBaseUrl($id . '/logout'),
                $data
            );

            if ($request->getStatusCode() !== 204) {
                throw new UserInvalidLogoutException();
            }
        } catch (\Exception $exception) {
            throw new UserInvalidLogoutException();
        }

        return;
    }

    /**
     * @return User
     * @throws UserNotFoundException
     */
    public function getUser() : User
    {
        if (empty($this->resource)) {
            throw new UserNotFoundException();
        }

        return $this->resource;
    }

    /**
     * @param string $path
     * @return string
     */
    private function getBaseUrl(string $path = '') : string
    {
        return $this->keycloakAdminConfig->getUrl(
            'admin/realms/' . $this->realmName . '/users/' . $path
        );
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    private function validator(array $data = []) : bool
    {
        if (empty($data['username'])) {
            throw new \Exception('Username is required.');
        }

        return true;
    }

    /**
     * @param string $data
     * @return User
     */
    private function deserialize(string $data) : User
    {
        return $this->serializer->deserialize($data, User::class, 'json');
    }
}
