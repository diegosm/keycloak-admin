<?php

declare(strict_types=1);

namespace KeycloakAdmin;

class KeycloakAdminConfig
{
    private $username;

    private $password;

    private $url;

    /**
     * KeycloakAdminConfig constructor.
     *
     * @param $username
     * @param $password
     * @param $url
     */
    public function __construct($username, $password, $url)
    {
        $this->username = $username;
        $this->password = $password;
        $this->url = $url;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUrl(string $url = '')
    {
        return $this->url . '/' . $url;
    }
}
