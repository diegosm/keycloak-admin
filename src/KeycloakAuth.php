<?php

declare(strict_types=1);

namespace KeycloakAdmin;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class KeycloakAuth
{
    /**
     * @Type("string")
     */
    private $accessToken;

    /**
     * @Type("string")
     */
    private $expiresIn;

    /**
     * @Type("string")
     */
    private $refreshToken;

    /**
     * @Type("string")
     */
    private $tokenType;

    /**
     * @Type("integer")
     * @SerializedName("not-before-policy")
     */
    private $notBeforePolicy;

    /**
     * @Type("string")
     */
    private $sessionState;

    /**
     * @Type("string")
     */
    private $scope;

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return mixed
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @return mixed
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }

    /**
     * @return mixed
     */
    public function getNotBeforePolicy()
    {
        return $this->notBeforePolicy;
    }

    /**
     * @return mixed
     */
    public function getSessionState()
    {
        return $this->sessionState;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }


}